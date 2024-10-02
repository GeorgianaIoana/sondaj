<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage; 
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;



class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-s-users';

    public static function form(Form $form): Form
    {
        $options = [];
        for ($i = 1; $i <= 1000; $i++) {
            $options[$i] = $i;
        }
        
        return $form
            ->schema([
                Select::make('id')
                    ->label('Id Select')
                    ->options($options)
                    ->required(),
                TextInput::make('name')->required(),
                TextInput::make('email')->required()->autocomplete('off'),
                TextInput::make('password')
                    ->password()
                    ->rules('min:3|max:10')
                    ->required()
                    ->autocomplete('new-password')
                    ->revealable(),
                DatePicker::make('date_of_birth')
                    ->required()
                    ->maxDate(now()),
                TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->required(),
                TextInput::make('city'),
                Toggle::make('status')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user')
                    ->onColor('success')
                    ->offColor('danger'),
                FileUpload::make('image')
                    ->label('Upload Image')
                    ->image()
                    ->directory('uploads/images')
                    ->disablePreview()
                    ->maxSize(1024)
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper(),
                TextInput::make('experience'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                ImageColumn::make('image')->label("Image")->circular()->url(fn ($record) => asset('storage/' . $record->image)),
                TextColumn::make('name')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('date_of_birth')->label('Birthday')->date('d/m/Y'),
                TextColumn::make('phone')->label('Phone'),
                TextColumn::make('city'),
                ToggleColumn::make('status'),
                TextColumn::make('experience'),
                
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
