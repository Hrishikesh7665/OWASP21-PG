const canvas = document.getElementById("particles");
const ctx = canvas.getContext("2d");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const particlesArray = [];

class Particle {
	constructor() {
		this.x = Math.random() * canvas.width;
		this.y = Math.random() * canvas.height;
		this.size = Math.random() * 5 + 1;
		this.speedX = Math.random() * 3 - 1.5;
		this.speedY = Math.random() * 3 - 1.5;
		this.color = `hsl(${Math.random() * 360}, 100%, 50%)`;
	}

	update() {
		this.x += this.speedX;
		this.y += this.speedY;

		if (this.size > 0.2) this.size -= 0.1;
		if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
		if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
	}

	draw() {
		ctx.fillStyle = this.color;
		ctx.beginPath();
		ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
		ctx.closePath();
		ctx.fill();
	}
}

function handleParticles() {
	for (let i = 0; i < particlesArray.length; i++) {
		particlesArray[i].update();
		particlesArray[i].draw();

		if (particlesArray[i].size <= 0.2) {
			particlesArray.splice(i, 1);
			i--;
		}
	}
}

function createParticles() {
	if (particlesArray.length < 100) {
		particlesArray.push(new Particle());
	}
}

function animateParticles() {
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	handleParticles();
	createParticles();
	requestAnimationFrame(animateParticles);
}

animateParticles();

window.addEventListener("resize", () => {
	canvas.width = window.innerWidth;
	canvas.height = window.innerHeight;
});