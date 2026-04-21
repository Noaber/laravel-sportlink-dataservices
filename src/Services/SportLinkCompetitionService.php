<?php

namespace Noaber\Sportlink\ClubData\Services;

class SportLinkCompetitionService
{
    private SportLinkService $sportLinkService;
    public function __construct(SportLinkService $sportLinkService)
    {
        $this->sportLinkService = $sportLinkService;
    }

    public function getCompetitionTypes(): array
    {
        return $this->sportLinkService->get('keuzelijst-competitiesoorten');
    }

    public function getCompetitionPeriods(): array
    {
        return $this->sportLinkService->get('keuzelijst-competitieperiode');
    }

    public function getMatchTypes(): array
    {
        return $this->sportLinkService->get('keuzelijst-spelsoorten');
    }

    public function getAgeCategories()
    {
        return $this->sportLinkService->get('keuzelijst-leeftijdscategorieen');
    }

    public function getTeamTypes(): array
    {
        return $this->sportLinkService->get('keuzelijst-teamsoorten');
    }
}