<?php

namespace Noaber\Sportlink\ClubData\Services;

class SportLinkTrainingService
{
    private SportLinkService $sportLinkService;
    public function __construct(SportLinkService $sportLinkService)
    {
        $this->sportLinkService = $sportLinkService;
    }

    public function getTeamTrainings(string $teamCode, string $localTeamCode): array
    {
        return $this->sportLinkService->get('team-trainingenlijst', [
            'teamcode' => $teamCode,
            'lokaleteamcode' => $localTeamCode
        ]);
    }
}