# Foreweather

Foreweather Abonelerine günlük hava durumu bilgilerinin gönderen ücetli bir servistir. Kullanıcılar bu servise REST
 API ile kayıt alabilir ve günlük hava durumu bilgilerini alabilir. Bu servise kayıt olan kullanıcılar ücretli 
 abonelerdir. Sistemde tanımlı hediye kodları ile kullanıcılar ücretsiz olarak abonelik kaydını tamamlayabilir.
 
## Kurulum

Foreweather'u keşfetmek istiyorsanız, geliştirme ortamını kullanmak iyi bir seçim olabilir. 

### Docker

Foreweather'un geliştirme sürümünü başlatmanın hızlı bir yolu github reposunu klonlamak ve aşağıdaki komutları çalıştırmaktır:

#### Docker Swarm 

Docker swarm ile ölçeklenebilir bir altyapı kullanabilirsiniz.

```bash

docker swarm init

docker stack deploy --compose-file docker-compose.yml foreweather

```

### Veritabanı

Çalıştırmanız gereken sql betiği [adresine](https://raw.githubusercontent.com/foreweather/api.foreweather.com/master/docker/database.sql) yüklenmiştir.

## Kullanım

Postman import dosyasını proje ana dizininde bulabilirsiniz. 

[Postman Import File](https://raw.githubusercontent.com/foreweather/api.foreweather.com/master/ForeweatherProject.postman_collection.json)

### API Referansı

Api dökümantasyonu docker yapılandırması sırasında otomatik olarak üretilir. Projeyi ayaklandırdıktan sonra aşağıdaki adresten API referans kaynağına ulaşabilirsiniz.

```
http://localhost:8888/documentation/index.html
```

## Lisans

Foreweather [MIT license](https://opensource.org/licenses/MIT). lisansı kapsamında kullanım ve geliştirmeye açıktır.
