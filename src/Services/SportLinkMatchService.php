<?php

namespace Noaber\Sportlink\ClubData\Services;

class SportLinkMatchService
{
    private SportLinkService $sportLinkService;
    public function __construct(SportLinkService $sportLinkService)
    {
        $this->sportLinkService = $sportLinkService;
    }

    public function getMatches(array $args = []): array
    {
        $defaults = [
            'sorteervolgorde' => 'datum',
            'gebruiklokaleteamgegevens' => 'NEE',
            'aantalregels' => 100,
            'aantaldagen' => 30,
            'weekoffset' => 0,
            'eigenwedstrijden' => 'JA',
            'thuis' => 'JA',
            'uit' => 'JA',
            'spelsoort' => 'ALLES',
            'competitiesoort' => 'ALLES',
            'dagsoort' => 'ALLES',
            'leeftijdscategorie' => 'ALLES',
        ];

        $params = array_merge($defaults, $args);

        return $this->sportLinkService->get('programma', $params);
    }

    public function getMatchResults(array $args = []): array
    {
        $defaults = [
            'aantalregels' => 100,
            'weekoffset' => -1,
            'aantaldagen' => 7,
            'gebruiklokaleteamgegevens' => 'NEE',
            'sorteervolgorde' => 'datum',
            'eigenwedstrijden' => 'JA',
            'thuis' => 'JA',
            'uit' => 'JA',
            'spelsoort' => 'ALLES',
            'leeftijdscategorie' => 'ALLES',
            'competitiesoort' => 'ALLES',
            'dagsoort' => 'ALLES',
        ];

        $params = array_merge($defaults, $args);

        return $this->sportLinkService->get('uitslagen', $params);
    }

    public function getPostponements(array $args = []): array
    {
        $defaults = [
            'aantaldagen' => 30,
            'aantalregels' => 20,
            'weekoffset' => 0,
            'gebruiklokaleteamgegevens' => 'NEE',
            'sorteervolgorde' => 'datum',
        ];

        $params = array_merge($defaults, $args);

        return $this->sportLinkService->get('afgelastingen', $params);
    }

    public function getMatchDetails(int $matchCode): array
    {
        return $this->sportLinkService->get('wedstrijd-informatie', [
            'wedstrijdcode' => $matchCode,
        ]);
    }

    public function getMatchParticipants(int $matchCode): array
    {
        return $this->sportLinkService->get('wedstrijd-deelnemers', [
            'wedstrijdcode' => $matchCode,
        ]);
    }

    public function getMatchHomeTeam(int $matchCode, bool $showPlayerPhoto = false): array
    {
        return $this->sportLinkService->get('wedstrijd-thuisteam', [
            'wedstrijdcode' => $matchCode,
            'toonlidfoto' => $showPlayerPhoto ? 'JA' : 'NEE',
        ]);
    }

    public function getMatchAwayTeam(int $matchCode, bool $showPlayerPhoto = false): array
    {
        return $this->sportLinkService->get('wedstrijd-uitteam', [
            'wedstrijdcode' => $matchCode,
            'toonlidfoto' => $showPlayerPhoto ? 'JA' : 'NEE',
        ]);
    }

    public function getMatchOfficials(int $matchCode): array
    {
        return $this->sportLinkService->get('wedstrijd-officials', [
            'wedstrijdcode' => $matchCode,
        ]);
    }

    public function getMatchVenue(int $matchCode): array
    {
        return $this->sportLinkService->get('wedstrijd-accommodatie', [
            'wedstrijdcode' => $matchCode,
        ]);
    }

    public function getMatchLockerRooms(int $matchCode): array
    {
        return $this->sportLinkService->get('wedstrijd-kleedkamers', [
            'wedstrijdcode' => $matchCode,
        ]);
    }

    public function getMatchStatistics(int $matchCode): array
    {
        return $this->sportLinkService->get('wedstrijd-statistieken', [
            'wedstrijdcode' => $matchCode,
        ]);
    }

    public function getMatchHistoricalResults(int $matchCode): array
    {
        return $this->sportLinkService->get('wedstrijd-historische-resultaten', [
            'wedstrijdcode' => $matchCode,
        ]);
    }
}