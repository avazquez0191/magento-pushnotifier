# Módulo de Notificaciones Push para Magento  
![Logo](/src/images/logo.png)  
Es un módulo sencillo de magento para enviar/recibir notificaciones push usando el SDK de Firebase. Las notificaciones llegan al dispositivo del usuario una vez que cambia el estado de sus órdenes en la tienda.  
*Compatibilidad [magento v1.9.4.5][firebasejs v7.14.4]*

# Entornos compatibles con el SDK de Firebase JavaScript
El servicio Cloud Messaging de Firebase brinda soporte para navegadores Edge, Firefox y Chrome así como las extensiones de este último.

# Proceso de instalación
El módulo aun no cuenta con las configuraciones de Setup para ser instalado como una extensión de magento, de modo que el proceso de instalacion sera manual.

1. Contar con una aplicación magento instalada (configuración inicial, base de datos, ect...).
1. Descargar o clonar el repositorio y copiar la carpeta magento del repositorio sobre la magento de tu aplicación, de modo que cada archivo (iniciando desde la raíz) tome su lugar.
1. Ejecutar el archivo "script.sql" en la base de datos. 

***Notas adicionales***  
* Si esta desplegando en local:
  * Debe configurar la dirección base como localhost/HTTP y deshabilitar o limpiar la cache de magento.
* Si esta desplegando en un dominio publico:
  * Debe contar con su certificación de seguridad SSL.

Listo!

# Manual de uso
1. El cliente debe hacer login en la aplicacion (Frontend).
1. Se solicita permiso para mostrar las notificaciones.  
![Logo](/src/images/opt_in_web.png)  
1. Se solicita y registra el token respectivo del dispositivo y se almacena en la base de datos conjuntamente con el identificador del cliente.  
![Logo](/src/images/token_gen_and_save.png)  
1. Se crea una orden para el cliente en cuestion y se cambian sus diferentes estados a medida que se trabaja el mismo.
1. Al cliente llegan dos tipo de notificaciones:
   1. Si tiene la aplicación en el navegador en primer plano se muestra una notificacion interna en la aplicación.
   1. Si no cuenta con el navegador o la aplicación activa llegará el mensaje via firebase-service-worker.  
![Logo](/src/images/push_send.png)  

# Consideraciones
Es un desarrollo joven y con mucho potencial, aún resta mucho trabajo por delante para lograr un resultado sólido.   
Propuestas para futuras versiones:  
- [ ] Identificar el dispositivo desde donde el cliente esta realizando la entrada a la aplicación.  
- [ ] Actualmente se envian los mensajes a tantos dispositivos como tenga registrado el usuario, pero no se tienen en cuenta los tokens que estan deshabilitados y estos también se procesan, de ahi que se necesite un proceso de actualizaión de tokens.  
- [ ] Ampliar el soporte a versiones móbiles y plataformas IOS/MAC  
- [ ] Crear "temas" de mensajes para agrupar los tokens de los clientes y enviar notificaciones bajo diversos criterios.  
- [ ] Reorganizar estructura del módulo de forma que actúe como módulo independiente.  
- [ ] Realizar pruebas unitarias.  
- [ ] Crear instalador (SetUp).  

