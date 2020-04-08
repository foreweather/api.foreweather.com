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

## Log Yönetimi

 * Centralized log aggregation: ELK

### 

Uygulama yapılandırması dağıtık olduğu için merkezi log yönetimi kurulmuştur.

Syslog ile toplanan loglar, logstash üzerinden filtrelenip Elasticsearch'te depolanır. 

## Uygulama Bileşenleri

Forewether yazılım geliştirme mimarisinin bileşenleri aşağıda listelenmiştir.

### Foreweather Api

Foreweather uygulamasının hizmetlerini sağlayan son kullanıcya yönelik restFul API servisi.

#### Kullanım

##### API Referansı

Api dökümantasyonu docker yapılandırması sırasında otomatik olarak üretilir. Projeyi ayaklandırdıktan sonra aşağıdaki adresten API referans kaynağına ulaşabilirsiniz.

```
http://localhost:8888/documentation/index.html
```

##### Postman Desteği

Postman import dosyasını proje ana dizininde bulabilirsiniz. 

[Postman Import File](https://raw.githubusercontent.com/foreweather/api.foreweather.com/master/ForeweatherProject.postman_collection.json)

#### [Foreweather Publisher](https://github.com/foreweather/publisher)

Foreweather Publisher; Abonelerine günlük hava durumu bilgilerini kullanıcının kayıtlı zaman dilimine göre gruplayıp 
yayın yapan servisidir.

#### [Foreweather Notify](https://github.com/foreweather/notify)

Foreweather Notify; Foreweather Abonelerine günlük bildirim gönderen servisidir.

## Lisans

Foreweather [MIT license](https://opensource.org/licenses/MIT). lisansı kapsamında kullanım ve geliştirmeye açıktır.
