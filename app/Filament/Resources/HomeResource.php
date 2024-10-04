<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Home;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\HomeResource\Pages;

class HomeResource extends Resource
{
    protected static ?string $model = Home::class;

    protected static ?string $pluralModelLabel = "Beranda Web";

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('subtitle')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('img')
                    ->multiple()
                    ->required()
                    ->image()
                    ->disk('public')
                    ->enableReordering()
                    ->columnSpanFull()
                    ->reactive()
                    ->afterStateUpdated(function ($state) {
                        if (!is_array($state)) {
                            throw new \Exception("File upload must be an array.");
                        }
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => strip_tags($state)),
                ImageColumn::make('img')
                    ->label('Images')
                    ->getStateUsing(function ($record) {
                        $images = $record->getImagesAttribute();
                        return array_slice(array_map(fn($image) => Storage::url($image), $images), 0, 3);
                    })
                    ->disk('public'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomes::route('/'),
            'create' => Pages\CreateHome::route('/create'),
            'edit' => Pages\EditHome::route('/{record}/edit'),
        ];
    }
}
