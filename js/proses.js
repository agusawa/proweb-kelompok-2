function simpan() {
  var nim = document.getElementById("nim").value;
  var nama = document.getElementById("nama").value;
  var uts = document.getElementById("uts").value;
  var uas = document.getElementById("uas").value;
  var tugas = document.getElementById("tugas").value;

  var params = "nim=" + nim + "&nama=" + nama + "&uts=" + uts + "&uas=" + uas + "&tugas=" + tugas;

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "tambah.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);

        document.getElementById("nim").value = "";
        document.getElementById("nama").value = "";
        document.getElementById("uts").value = "";
        document.getElementById("uas").value = "";
        document.getElementById("tugas").value = "";

        renderTable();
    }
  };
  xhttp.send(params);
}

function edit(nimLama) {
  var nim = document.getElementById("nim").value;
  var nama = document.getElementById("nama").value;
  var uts = document.getElementById("uts").value;
  var uas = document.getElementById("uas").value;
  var tugas = document.getElementById("tugas").value;

  var params = "nim=" + nim + "&nama=" + nama + "&uts=" + uts + "&uas=" + uas + "&tugas=" + tugas;

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "edit.php?nim=" + nimLama, true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);
        tampilkanFormTambah();
        renderTable();
    }
  };
  xhttp.send(params);
}

function hapus(nim) {
  var diterima = confirm('Apakah anda yakin ingin menghapus data ini?');
  if (!diterima) {
    return;
  }

  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "hapus.php?nim=" + nim, true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // alert(this.responseText);
      renderTable();
    }
  };
  xhttp.send();
}

function tampilkanFormTambah() {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "tambah.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('form-container').innerHTML = this.responseText;
    }
  };
  xhttp.send();
}

function tampilkanFormEdit(nim) {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "edit.php?nim=" + nim, true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('form-container').innerHTML = this.responseText;
    }
  };
  xhttp.send();
}

function renderTable() {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "table.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('table-container').innerHTML = this.responseText;
    }
  };
  xhttp.send();
}
