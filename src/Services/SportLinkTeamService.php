<?php

namespace Noaber\Sportlink\ClubData\Services;

class SportLinkTeamService
{
    private SportLinkService $sportLinkService;
    public function __construct(SportLinkService $sportLinkService)
    {
        $this->sportLinkService = $sportLinkService;
    }

    public function getTeams(array $args = []): array
    {
        $defaults = [
            'competitieperiode' => '',
            'teamsoort' => 'ALLES',
            'geslacht' => 'ALLES',
            'spelsoort' => 'ALLES',
            'competitiesoort' => 'ALLES',
            'leeftijdscategorie' => 'ALLES',
            'gebruiklokaleteamgegevens' => 'NEE',
        ];

        $params = array_merge($defaults, $args);

        return $this->sportLinkService->get('teams', $params);
    }

    public function getTeam(int $teamCode, int $localTeamCode, array $args = []): array
    {
        $defaults = [
            'teampersoonrol' => 'ALLES',
            'toonlidfoto' => 'NEE',
        ];

        $params = array_merge([
            'teamcode' => $teamCode,
            'lokaleteamcode' => $localTeamCode,
        ], array_merge($defaults, $args));

        return $this->sportLinkService->get('team-indeling', $params);
    }

    public function getTeamData(int $teamCode, int $localTeamCode): array
    {
        return $this->sportLinkService->get('team-gegevens', [
            'teamcode' => $teamCode,
            'lokaleteamcode' => $localTeamCode,
        ]);
    }

    public function getTeamSponsors(int $teamCode, int $localTeamCode): array
    {
        return $this->sportLinkService->get('team-sponsors', [
            'teamcode' => $teamCode,
            'lokaleteamcode' => $localTeamCode,
        ]);
    }
}