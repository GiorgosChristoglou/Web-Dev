// Checks whether the username is empty or not.
function checkUsername() {
  var username = document.getElementById("username");

  if ( username.value.length != 0 ) {
    return true;
  }

  alert("Username can't be empty");

  return false;
}

// Checks whether the given password and username match the
// the criteria to form a valid account.
function checkNewAccountDetails() {
  var username = document.getElementById("newUsername");
  var password = document.getElementById("newPassword");

  if ( username.value.length < 4 || username.value.length > 16) {
    alert("Username must have 4 to 16 characters size");
    return false;
  }

  if ( password.value.length < 8 || password.value.length > 16) {
    alert("Password must have 8 to 16 characters size");
    return false;
  }

  return true;
}

$(window).ready(function() {
  $('#logoutButton').on('mouseover', function() {
    $('#logoutButton').css( {
      'background-color' : '#ecc'
    });
  });

  $('#logoutButton').on('mouseleave', function() {
    $('#logoutButton').css('background-color', '#ccc');
  });
});
