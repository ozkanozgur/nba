### NBA 2017-2018
Tarih girdisi ile NBA 2017 - 2018 sezonuna ait Double Double yapan oyuncuların listesini veren uygulamadır. 

#### Kurulum
Kurulumun yapılabilmesi için [PHP Symfony](https://symfony.com/ "PHP Symfony") frameworkünün ve [composer dependency manager](https://getcomposer.org/ "composer dependency manager") in kurulması gerekmektedir. 

Daha sonra repositorynin;

```bash
git clone https://github.com/xander1977/nba.git
```

komutu ile indirilmesi gerekmektedir. 

İndirmenin ardından;

```bash
composer install
``` 

komutu ile proje gereklilikleri kurulmalıdır. 

Proje ana dizininindeki .env dosyasındaki;

```
DATABASE_URL=mysql://user_name:password@mysql_host:3306/nba
```

satırındaki yerler uygun şekilde değiştirilmelidir. 

Terminal üzerinden proje dizinine geçilip sırası ile aşağıdaki komutların çalıştırılmalıdır.

```bash
Symfony console doctrine:database:create 
// Eğer yukarıdaki kod çalışmazsa
php bin/console doctrine:database:create 

Symfony make:migration

Symfony doctrine:migrations:migrate

Symfony doctrine:fixtures:load

```
Proje ana dizininde bulunan `nba.sql` dosyası uygun program ile MySql servera import edilir. 

Tüm işlemler sorunsuz bir şekilde tamamlandıysa son olarak terminal üzerinde proje ana dizinine gidilir ve

```
Symfony serve
// Yukarıdaki komut hata verir ise

php bin/console server:run
```

komutu kullanılarak proje çalışır hale getirilir.
