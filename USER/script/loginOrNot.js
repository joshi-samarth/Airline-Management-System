
function session() {
    var status = sessionStorage.getItem('bool');
    if (status != "true") {
      window.location.href = 'log-in.php';
    }
  }