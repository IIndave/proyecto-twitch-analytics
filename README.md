# Twitch Analytics App
Esta aplicación permite consultar información de usuarios y streams en directo desde la API oficial de Twitch. 
Está construida con Laravel en el backend y se conecta mediante HTTP a los endpoints de Twitch para mostrar datos actualizados.


* Cómo ejecutar la aplicación
1. Clona el repositorio
- git clone https://github.com/usuario/proyecto-twitch-analytics.git
- cd proyecto-twitch-analytics

2. Instala las dependencias de PHP
- composer install

3. Configura tus claves de Twitch en .env
TWITCH_CLIENT_ID=tu_client_id
TWITCH_CLIENT_SECRET=tu_client_secret

4. Arranca el servidor
php artisan serve

5. EJEMPLOS de consulta la API en tu navegador:
http://localhost:8000/api/twitch/analytics/user/141981764
http://localhost:8000/api/twitch/analytics/streams


* Decisiones técnicas
Laravel: Elegido por su claridad y facilidad para consumir APIs externas.
HTTP Client de Laravel: Se usa para conectarse a la API de Twitch de forma limpia y sencilla.
Controlador y servicio separados: Lógica de negocio y llamadas a la API separadas en controlador y servicio para mejorar la mantenibilidad y escalabilidad.
