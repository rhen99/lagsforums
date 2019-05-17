import axios from 'axios';

// Mobile Menu Toggle
const menuBtn = document.querySelector('.menu-bars');
const navbar = document.querySelector('.navbar');

menuBtn.addEventListener('click', (e) => {
	e.preventDefault();
	navbar.classList.toggle('show-menu');
	if (!dropdownMenu.className.match(/\bhide\b/)) {
		dropdownMenu.classList.add('hide');
	}
});

//Dropdown Menu Toggle
const dropdownBtn = document.querySelector('.user-dropdown');

if (dropdownBtn !== null) {
	const dropdownMenu = document.querySelector('.user-menu');

	dropdownBtn.addEventListener('click', (e) => {
		e.preventDefault();
		dropdownMenu.classList.toggle('hide');
	});
}
//Option Toggle
const optionsToggle = document.querySelectorAll('.option_toggle');

optionsToggle.forEach((toggle) => {
	toggle.addEventListener('click', (e) => {
		e.preventDefault();

		const opt = toggle.parentNode.querySelector('.options');
		opt.classList.toggle('hide');
	});
});
const preview = document.querySelector('#preview');
const fileInp = document.querySelector('.profile');

//Upload Image Preview
function previewFile() {
	const file = document.querySelector('#profile').files[0];
	const reader = new FileReader();

	reader.addEventListener(
		'load',
		function() {
			preview.src = reader.result;
		},
		false
	);

	if (file) {
		reader.readAsDataURL(file);
	}
}

if (fileInp) {
	fileInp.addEventListener('change', previewFile);
}

const votes = document.querySelectorAll('.vote');
//Post Votes
function postVote(e) {
	e.preventDefault();
	let isVote = e.target.previousElementSibling == null;
	const comemntId = parseInt(e.target.parentNode.parentNode.parentNode.dataset['id']);
	const ups = parseInt(document.querySelectorAll('.up').textContent);
	const downs = parseInt(document.querySelectorAll('.down').textContent);
	const params = {
		voted: isVote,
		comment_id: comemntId,
		_token: token
	};

	axios.post(urlVote, params).then((res) => {}).catch((err) => console.log(err));
}
votes.forEach((vote) => vote.addEventListener('click', postVote));
