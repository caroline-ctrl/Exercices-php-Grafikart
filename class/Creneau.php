<?php
class Creneau 
{
    public $debut;
    public $fin;

    public function __construct(int $debut, int $fin)
    {
        $this->debut = $debut;
        $this->fin = $fin;
    }

    
    public function toHTML(): string
    {
        return '<strong>' . $this->debut . 'h</strong> à <strong>' . $this->fin . 'h</strong>';
    }


    public function inclusHeure(int $heure): bool
    {
        return $heure >= $this->debut && $heure <= $this->fin;
    }


    public function intersect(Creneau $instance): bool
    {
        return $this->inclusHeure($instance->debut) || 
        $this->inclusHeure($instance->fin) || 
        ($this->debut > $instance->debut && $this->fin < $instance->fin);
    }
}