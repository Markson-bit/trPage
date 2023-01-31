  function validateForm() {
    var x = document.getElementById("username").value;
    var y = document.getElementById("haslo").value;
    var z = document.getElementById("email").value;
    var a = document.getElementById("phone").value;
    var b = document.getElementById("urodz").value;
    if (x == "" || y == "" || z == "" || a == "" || b == "") {
      alert("Wypełnij wszystkie pola");
      return false;
    }
  }
