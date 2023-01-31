function validateForm() {
    var x = document.getElementById("username").value;
    var y = document.getElementById("haslo").value;
    if (x == "" || y == "") {
      alert("Wypełnij wszystkie pola");
      return false;
    }
  }
