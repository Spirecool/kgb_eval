<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'skill', targetEntity: Mission::class)]
    private Collection $missions;

    #[ORM\OneToMany(mappedBy: 'skill', targetEntity: Agent::class)]
    private Collection $agents;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
        $this->agents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Mission>
     */
    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Mission $mission): self
    {
        if (!$this->missions->contains($mission)) {
            $this->missions[] = $mission;
            $mission->setSkill($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getSkill() === $this) {
                $mission->setSkill(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Agent>
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(Agent $agent): self
    {
        if (!$this->agents->contains($agent)) {
            $this->agents[] = $agent;
            $agent->setSkill($this);
        }

        return $this;
    }

    public function removeAgent(Agent $agent): self
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getSkill() === $this) {
                $agent->setSkill(null);
            }
        }

        return $this;
    }
}
