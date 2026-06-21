<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffilioSetting extends Model
{
    protected $table = 'affilio_settings';
    protected $primaryKey = 'setting_id';

    protected $fillable = [
    'site_name',
    'site_tagline',
    'site_description',
    'primary_color',
    'secondary_color',
    'base_color',
    'surface_color',
    'card_color',
    'text_color',
    'muted_text_color',
    'hero_title',
    'hero_subtitle',
    'hero_button_text',
    'hero_button_link',
    'about_title',
    'about_description',
    'contact_email',
    'contact_whatsapp',
    'footer_text',
];
}