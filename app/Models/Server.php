<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    // Specify Table
    protected $table = 'servers';

    /**
     * Gets the Image Path depending on server map
     *
     * @return string
     */
    public function getServerImageAttribute() {
        switch($this->map) {
            case "CrystalIsles":
                return asset('imgs/servers/crystalIsles.png');
                break;
            case "Genesis":
                return asset('imgs/servers/genesis.png');
                break;
            case "Valguero_P":
                return asset('imgs/servers/valguero.png');
                break;
            case "Extinction":
                return asset('imgs/servers/extinction.png');
                break;
            case "Aberration":
                return asset('imgs/servers/abberation.png');
                break;
            case "Ragnarok":
                return asset('imgs/servers/ragnarok.png');
                break;
            case "ScorchedEarth":
                return asset('imgs/servers/scorchedEarth.png');
                break;
            case "TheCenter":
                return asset('imgs/servers/theCenter.png');
                break;
            case "TheIsland":
                return asset('imgs/servers/theIsland.png');
                break;
            default:
                return asset('imgs/servers/missing.png');
                break;
        }
    }

    /**
     * Returns HTML code of a Bootstrap 4 Badge depending on status
     *
     * @return string
     */
    public function getServerStatusAttribute() {
        switch($this->status) {
            case "dead":
                $css = "badge-danger";
                $text = "Offline";
                break;
            case "online":
                $css = "badge-success";
                $text = "Online";
                break;
            default:
                $css = "badge-danger";
                $text = "Unknown";
                break;
        }

        return "<span class=\"badge badge-pill {$css}\">{$text}</span>";
    }

    /**
     * Returns an array of Bootstrap 4 Pill Badges depending on the attributes of the server
     *
     * @return array
     */
    public function getServerAttributesAttribute() {
        $html = [];

        // If PVE is enabled
        if($this->pve) {
            array_push($html, "<span class=\"badge badge-pill badge-pve\">PvE</span>");
        }
        // If PVP is enabled
        if(!$this->pve) {
            array_push($html, "<span class=\"badge badge-pill badge-pvp\">PvP</span>");
        }
        // If Mods are on
        if($this->modded) {
            array_push($html, "<span class=\"badge badge-pill badge-modded\">Modded</span>");
        }
        // If crossplay is on
        if($this->crossplay) {
            array_push($html, "<span class=\"badge badge-pill badge-crossplay\">Crossplay</span>");
        }
        // If private is on
        if($this->private) {
            array_push($html, "<span class=\"badge badge-pill badge-private\"><i class=\"fas fa-lock\"></i> Private</span>");
        }

        return $html;
    }

    public function getLastUpdatedAtAttribute() {
        return $this->updated_at;
    }
}
