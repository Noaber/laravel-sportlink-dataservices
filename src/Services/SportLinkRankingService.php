<?php

namespace Noaber\Sportlink\ClubData\Services;

class SportLinkRankingService
{
    private SportLinkService $sportLinkService;
    public function __construct(SportLinkService $sportLinkService)
    {
        $this->sportLinkService = $sportLinkService;
    }

    public function getGroupStandings(string|int $groupCode, array $args = []): array
    {
        $defaults = [
            'gebruiklokaleteamgegevens' => 'NEE',
        ];

        $params = array_merge([
            'poulecode' => $groupCode,
        ], array_merge($defaults, $args));

        return $this->sportLinkService->get('poulestand', $params);
    }

    public function getPeriodStandings(string|int $groupCode, int $periodNumber = -1): array
    {
        return $this->sportLinkService->get('periodestand', [
            'poulecode' => $groupCode,
            'periodenummer' => $periodNumber,
        ]);
    }

    public function getGroupLineup(string|int $groupCode): array
    {
        return $this->sportLinkService->get('poule-indeling', [
            'poulecode' => $groupCode,
        ]);
    }

    public function getGroupSchedule(string|int $groupCode, array $args = []): array
    {
        $defaults = [
            'aantaldagen' => 30,
            'weekoffset' => 0,
            'eigenwedstrijden' => 'JA',
            'gebruiklokaleteamgegevens' => 'NEE',
        ];

        $params = array_merge([
            'poulecode' => $groupCode,
        ], array_merge($defaults, $args));

        return $this->sportLinkService->get('poule-programma', $params);
    }

    public function getGroupResults(string|int $groupCode, array $args = []): array
    {
        $defaults = [
            'aantaldagen' => 14,
            'weekoffset' => -2,
            'eigenwedstrijden' => 'JA',
            'sorteervolgorde' => 'datum',
            'gebruiklokaleteamgegevens' => 'NEE',
        ];

        $params = array_merge([
            'poulecode' => $groupCode,
        ], array_merge($defaults, $args));

        return $this->sportLinkService->get('pouleuitslagen', $params);
    }

    public function getGroupList(): array
    {
        return $this->sportLinkService->get('poulelijst');
    }

    public function getTeamGroupList(int $teamCode, int $localTeamCode): array
    {
        return $this->sportLinkService->get('teampoulelijst', [
            'teamcode' => $teamCode,
            'lokaleteamcode' => $localTeamCode,
        ]);
    }
}