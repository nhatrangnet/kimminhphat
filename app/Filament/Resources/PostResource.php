<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->live()
                    // ->afterStateUpdated(function (Get $get, Set $set, ?string $operation, ?string $old, ?string $state, ?Post $record) {
                    //         if ( $operation == 'edit' && $record->isPublished()) {
                    //             return;
                    //         }
                    //         if ( ( $get('slug') ?? '' ) !== Str::slug($old)) {
                    //             return;
                    //         }

                    //         $set('slug', Str::slug($state));
                    //     }
                    // )
                    ->required(),
                // TextInput::make('slug')
                //     ->maxLength(255)
                //     // ->unique( Post::class, 'slug', fn ($record) => $record)
                //     ->disabled( fn (?string $operation, ?Post $record) => $operation == 'edit' && $record->isPublished() )
                //     ->required(),
                RichEditor::make('excerpt')->label( __('Preview') )->columnSpan(2),
                // RichEditor::make('content')->columnSpan(2)
                //     ->extraAttributes(['x-ref' => 'editor'])
                //     ->hintAction(\Filament\Forms\Components\Actions\Action::make('fullScreen')
                //     ->alpineClickHandler('$refs.editor.requestFullscreen()')),
                TinyEditor::make('content')
                    ->profile('default|simple|full|minimal|none|custom')
                    ->columnSpan('full')
                    ->extraAttributes(['x-ref' => 'editor'])
                    ->hintAction(\Filament\Forms\Components\Actions\Action::make('fullScreen')
                    ->alpineClickHandler('$refs.editor.requestFullscreen()')),
                Select::make('category_id')->label(__('Category'))->options(
                   Category::all()->pluck('name', 'id')
                ),
                Toggle::make('feature')->inline(false)->label(__('Feature')),
                FileUpload::make('thumbnail')->disk('public')->directory('thumbnail'),
                FileUpload::make('images')
                    ->disk('public')
                    ->directory('posts')
                    ->multiple()
                    ->panelLayout('grid')
                    ->downloadable()
                    ->moveFiles()
                    ->maxSize(2024)
                    ->minFiles(0)
                    ->maxFiles(8),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('updated_at')->date('d-m-Y'),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
