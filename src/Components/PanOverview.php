<?php

namespace SolutionForest\FilamentPanphp\Components;

use Filament\Forms\Get;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Pan\PanConfiguration;
use SolutionForest\FilamentPanphp\Models\PanAnalytics;

class PanOverview extends BaseWidget
{
    public function table(Table $table): Table
    {
        $currentPanConfiguration = PanConfiguration::instance()->toArray();
        return $table->query(fn() => PanAnalytics::query())
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('impressions')->sortable(),
                TextColumn::make('hovers')->sortable(),
                TextColumn::make('clicks')->sortable()
            ])
            ->actions([
                DeleteAction::make()
            ])
            ->headerActions([
                CreateAction::make()
                ->disableLabel()
                ->icon('heroicon-o-plus-circle')
                ->model(PanAnalytics::class)
                ->form([
                    TextInput::make('name')
                        ->required()
                        ->unique('pan_analytics', 'name')
                        ->maxLength(255),
                ]),
                Action::make('Config')
                ->disableLabel()
                ->icon('heroicon-o-adjustments-horizontal')
                ->form([
                    Checkbox::make('unlimitedAnalytics')
                        ->inline()
                        ->live()
                        ->default($currentPanConfiguration['max_analytics'] >= PHP_INT_MAX)
                        ->hidden(fn (Get $get): bool => $currentPanConfiguration['max_analytics'] < PHP_INT_MAX),
                    TextInput::make('maxAnalytics')
                        ->numeric()
                        ->label('Max Analytics')
                        ->default($currentPanConfiguration['max_analytics'])
                        ->visible(fn (Get $get): bool => ! $get('unlimitedAnalytics')),
                    TagsInput::make('allowedAnalytics')
                        ->label('Allowed Analytics')
                        ->separator(',')
                        ->default($currentPanConfiguration['allowed_analytics'])
                ])
                ->modalCancelAction(false)
                ->modalSubmitAction(false)
                // ->action(function (array $data): void {
                //     $unlimitedAnalytics = $data['unlimitedAnalytics'] ?? false;
                //     $maxAnalytics = $data['maxAnalytics'] ?? 50;
                //     $allowedAnalytics = $data['allowedAnalytics'] ?? [];
                //     if($unlimitedAnalytics){
                //         PanConfiguration::unlimitedAnalytics();
                //     }else{
                //         PanConfiguration::maxAnalytics($maxAnalytics);
                //     }
                //     PanConfiguration::allowedAnalytics(explode(",", $allowedAnalytics ));
                // })
            ]);
    }
}
