
function comprob2()
{
   var nombre = document.login.nick.value;
   var pasw = document.login.pass.value;

   var element = document.getElementById("id01");

   if (nombre.length > 40)
   {  

      element.innerHTML = "New Heading";
      
      alert("Buen dia lalala");
      return false;
   }
   
   if (pasw.length >= 3 && pasw.length <= 6)
   {
      alert("Si tienes una contrasenia entre 30 y 6, no puedes usar este programa.");
      return false;
   }
   
   return true;
}