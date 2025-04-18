const judul = document.getElementById('judul');
judul.style.color='maroon';

const p = document.getElementsByTagName('p');
for(let i=0; i<p.length; i++){
    p[i].style.backgroundColor='pink';
}

const h1 = document.getElementsByTagName('h1')[0];
h1.style.backgroundColor='palegoldenrod';

const p2 = document.getElementsByClassName('p2')[0];
p2.style.backgroundColor='paleturquoise';

// const li2 = document.querySelector('section#b> li;nth-child(2)")
// li2.style.backgroundColor='hotPink';

const p3 = document.querySelectorAll('section#a> p')[2];
p3.style.backgroundColor='red';
 
const sectionB = document.getElementById('b');
const p4 = document.getElementsByTagName('p')[0];
p4.style.backgroundColor='green';
