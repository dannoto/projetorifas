<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.maskMoney.min.js"></script>

<script>
  $(".tickets-quantity").on('click', 'li', function() {
    alert($(this).text());
  });





  function toggleNav() {
    const nav = document.getElementById("sideNav")
    if (nav.style.width == "0px") {
      nav.style.width = "90%"
      nav.style.display = "block"
    } else {
      nav.style.width = "0px"
      nav.style.display = "none"
    }
  }
</script>

<script>
  function insertCookie(name, value, daysToExpire = 7, path = "/") {
    const expirationDate = new Date();
    expirationDate.setTime(expirationDate.getTime() + daysToExpire * 24 * 60 * 60 * 1000);
    const expires = "expires=" + expirationDate.toUTCString();
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + "; " + expires + "; path=" + path;
  }

  function getCookie(name) {
    const cookies = document.cookie.split("; ");
    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].split("=");
      const cookieName = decodeURIComponent(cookie[0]);
      const cookieValue = decodeURIComponent(cookie[1]);
      if (cookieName === name) {
        return cookieValue;
      }
    }
    return null;
  }

  function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }
</script>

<script>
  $('.cky-btn-accept').on('click', function(e) {

    insertCookie('consent', 1, 365, path = "/")
    $('.cky-consent-container').css('display', 'none')

  })

  $('.cky-btn-reject').on('click', function(e) {

    insertCookie('consent', 0, 365, path = "/")
    $('.cky-consent-container').css('display', 'none')

  })
  if (getCookie('consent')) {} else {
    $('.cky-consent-container').css('display', 'block')
  }
</script>