# Brewtopia

**Brewtopia** is een platform voor bierliefhebbers om hun favoriete bieren te ontdekken, beoordelen en delen met andere gebruikers. Het biedt gebruikers de mogelijkheid om bieren te beoordelen, nieuwsartikelen te lezen, en veel meer.

---

## Functies

- **Bieren ontdekken**: Verken een geselecteerde lijst van de beste ambachtelijke bieren van over de hele wereld. (niet volledig)
- **Bieren beoordelen en recenseren**: Deel je mening over de bieren die je hebt geprobeerd en lees de recensies van andere gebruikers. (niet volledig)
- **Verbinden met vrienden**: Volg je vrienden, deel je favoriete bieren, en beleef proefervaringen samen. (niet volledig)
- **Nieuwsartikelen lezen**: Lees en voeg nieuwsartikelen toe over de bierwereld.
- **FAQ**: Krijg antwoorden op veelgestelde vragen over de website en het platform.

---

## Installatie

### Vereisten
- PHP 8.0 of hoger
- Composer
- Laravel 8.x
- MySQL (of een andere ondersteunde database)

### Stappen voor installatie

1. **Clone de repository:**
    ```bash
    git clone https://github.com/jouwgebruikersnaam/brewtopia.git
    cd brewtopia
    ```

2. **Installeer de afhankelijkheden:**
    ```bash
    composer install
    ```

3. **Stel de omgeving in:**
    Maak een kopie van het `.env.example` bestand naar `.env` en configureer je database-instellingen.
    ```bash
    cp .env.example .env
    ```

4. **Genereer de applicatiesleutel:**
    ```bash
    php artisan key:generate
    ```

5. **Voer migraties uit:**
    ```bash
    php artisan migrate
    ```

6. **Start de server:**
    ```bash
    php artisan serve
    ```

---

## Functionaliteit

### Beheer van Gebruikers
Als admin kun je gebruikers beheren:
- Bekijk, voeg toe, bewerk en verwijder gebruikers.
- Beheer hun admin-status.

### Beheer van Nieuwsartikelen
Admins kunnen nieuwsartikelen beheren:
- Voeg nieuwsartikelen toe.
- Bewerken en verwijder artikelen.
- Weergave van de meest recente artikelen op de homepagina.

### Beheer van FAQ's
Admins kunnen FAQ's beheren:
- Voeg nieuwe FAQ's toe.
- Bewerken en verwijderen van bestaande FAQ's.

### Profielbeheer
Gebruikers kunnen hun profiel bewerken:
- Werk je naam, e-mail, en wachtwoord bij.
- Upload een profielfoto.

---

## Gebruikte Technologieën

- **Laravel 8.x**: PHP-framework voor webontwikkeling.
- **MySQL**: Relationele database voor gegevensopslag.
- **Blade**: Templating engine voor Laravel.
- **Tailwind CSS**: Utility-first CSS framework.
- **Vue.js** (optioneel): Voor interactieve UI-componenten.

---

## Contributie

1. Fork dit project.
2. Maak een nieuwe branch voor je wijzigingen.
3. Commit je wijzigingen.
4. Open een Pull Request.

---

## Licentie

Dit project is gelicenseerd onder de MIT License - zie het [LICENSE](LICENSE) bestand voor meer informatie.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
