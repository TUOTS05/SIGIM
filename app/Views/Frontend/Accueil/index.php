<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>


   <div align="center">

      <h1>systeme d'alerte !</h1>

  <!--    <form action="<php?= # base_url('/Alert_notif/save'); ?>" method="post">
         <select name="id_dest" id="dest">
            <option value="0">Aucun</option>
            <option value="1">Mr Souley Diang</option>
         </select>
         <button type="submit">Signaler</button>
      </form>    -->
    

  <div id="notifications"></div>

  <audio id="notificationSound" autoplay="true" >
  <source src="emergency-alarm.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>

  

   </div>


   <script>
      // Vérifiez les notifications toutes les 5 secondes
setInterval(function() {
  // Faites une requête AJAX pour récupérer les nouvelles notifications
  fetch("/check_notifications")
    .then(response => response.text())
    .then(data => {
      // Si des notifications sont disponibles, affichez-les
      if (data !== "") {
        // Créez une nouvelle notification
        const notification = document.createElement("div");
        notification.textContent = data;

        // Ajoutez la notification au conteneur de notifications
        document.getElementById("notifications").appendChild(notification);

        // Jouez le son (en respectant les politiques d'interaction de l'utilisateur)
        const audio = document.getElementById("notificationSound");
        if (audio.play()) {
          audio.play();
        } else {
         audio.pause();
        }
      }
    });
}, 5000);
   </script>

</body>
</html>