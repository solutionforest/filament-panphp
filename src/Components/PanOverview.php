<?php

namespace SolutionForest\FilamentPanphp\Components;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Pan\PanConfiguration;
use SolutionForest\FilamentPanphp\Models\PanAnalytics;

class PanOverview extends BaseWidget
{
    public function table(Table $table): Table
    {
        $currentPanConfiguration = PanConfiguration::instance()->toArray();

        return $table->query(fn () => PanAnalytics::query())
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('impressions')->sortable(),
                TextColumn::make('hovers')
                    ->formatStateUsing(
                        fn (mixed $state, ?PanAnalytics $record) => number_format($state) . ' (' . number_format($record->hover_percentage, 1) . '%)'
                    )
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderByRaw('(hovers / impressions) ' . $direction);
                    }),
                TextColumn::make('clicks')
                    ->formatStateUsing(
                        fn (mixed $state, ?PanAnalytics $record) => number_format($state) . ' (' . number_format($record->click_percentage, 1) . '%)'
                    )
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderByRaw('(clicks / impressions) ' . $direction);
                    }),
            ])
            ->actions([
                DeleteAction::make(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->hiddenLabel()
                    ->icon('heroicon-o-plus-circle')
                    ->model(PanAnalytics::class)
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->unique('pan_analytics', 'name')
                            ->maxLength(255),
                    ]),
                Action::make('Config')
                    ->hiddenLabel()
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
                            ->default($currentPanConfiguration['allowed_analytics']),
                    ])
                    ->modalCancelAction(false)
                    ->modalSubmitAction(false),
                // Prepare for the future
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
