NgRest Plugins
==============
Hier findest du eine übersicht an Plungins welche du einem Feld zuweisen kannst. Hier ein Beispiel einer Anwendung des `text` Plugins auf das Feld `name`:

```php
$config->list->field('name', 'Vorname')->text();
```

Plugin Übersicht
-----------

|Name                                                  |Description | Options
|-------------------                                   |------------- | --- 
|text                                                  |Text Feld (max 255 zeichen)|
|textarea                                              |Textarea (mehrzeilige eingabe text). |
|password                                              |Passwort Feld|
|[select](ngrest-plugin-select.md)                	|Select Dropdown Menu|
|toggleStatus                                          |Checkbox mit `0` und `1` werte.|
|image                                                 |Erstellt ein Bild Uploader welche einen integer wert mit der Bild Id zurück gibt.| `mage(false)` stellt die filter selektion aus.
|imageArray                                            |*i18n wird nicht unterstützt* Erstellt ein Bild und Text(Label) Mehrfach selektor.|
|file                                                  |Erstellt ein Datei Uploader welche einen integer wert mit der Datei Id zurück gibt.|
|fileArray											   |*i18n wird nicht unterstützt* Erstellt ein mehrfach upload von Dateien und gibt ein Array mit der jeweiligen FileId und Caption zurück|
|[checkboxRelation](ngrest-plugin-checkboxrelation.md) |Eine Checkbox auswahl basierend auf einer *junction table*. |
|date                                          |Erstellt ein *Datum* Selektor Feld und gibt einen Unix Timestamp zurück.|
|datetime                                          |Erstellt ein *Datum und Zeit* Selektor und gibt einen Unix Timestamp zurück.|
|cmsPage    |Eine CMS Seite kann ausgewählt werden welche danach an dieser erstellt gerendert und angezeigt wird. Feld muss interger sein|
|color                                                  |Stellt den RGB Wert in Hexadezimalangabe (z.B. `FF0000`) als Farbe dar (funktioniert nur im *List*-View).|
|number                                                  |Zahlenfeld.|
|decimal                                                |Gebrochene Zahl (float).| `steps` gibt die geforderten Nachkommastellen und Schrittgrösse an. Default = 0.001
|cmsPage                                                |Gibt ein menu object zurück

