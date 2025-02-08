document.querySelector('.cardnum').oninput = () =>
{
    document.querySelector('.cardnumberbox').innerText = document.querySelector('.cardnum').value;
}

document.querySelector('.cardhold').oninput = () =>
{
    document.querySelector('.cardholdername').innerText = document.querySelector('.cardhold').value;
}

document.querySelector('.monthinput').oninput = () =>
{
    document.querySelector('.expmonth').innerText = document.querySelector('.monthinput').value;
}

document.querySelector('.yearinput').oninput = () =>
{
    document.querySelector('.expyear').innerText = document.querySelector('.yearinput').value;
}

document.querySelector('.cvvinput').onmouseenter = () =>
{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
}

document.querySelector('.cvvinput').onmouseleave = () =>
{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
}

document.querySelector('.cvvinput').oninput = () =>
{
    document.querySelector('.cvvbox').innerText = document.querySelector('.cvvinput').value;
}

