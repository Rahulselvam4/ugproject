document.getElementById('showDialogBtn').addEventListener('click', function() {
    document.getElementById('myModal').style.display = 'block';
});

document.getElementById('closeDialogBtn').addEventListener('click', function() {
    document.getElementById('myModal').style.display = 'none';
});

document.getElementById('button1').addEventListener('click', function() {
    alert('Yu agreed to this term');
});

