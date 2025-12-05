document.addEventListener("DOMContentLoaded", () => {

    const canvas = document.getElementById("canvas_animation");
    const ctx = canvas.getContext("2d");

    // Set the animation to take up the entire window
    function fullscreen()
    {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    fullscreen();
    window.addEventListener("resize", fullscreen);

    const TOTAL_SHAPES = 50;
    const shapes = [];

    let types = ["circle", "square", "triangle"];
    function generate_shape()
    {
        // Return an object of a random shape, coordinates on screen, size, speed, and transparency
        return{
            type: types[Math.floor(Math.random() * types.length)],
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            size: Math.random() * 12 + 6,
            speed: Math.random() * 0.6 + 0.3,
            opacity: Math.random() * 0.6 + 0.2
        };
    }

    // Fill array with random shape objects
    for (let i = 0; i < TOTAL_SHAPES; i++)
    {
        shapes.push(generate_shape());
    }

    function draw_shape(shape) {

        ctx.fillStyle = "rgba(130, 180, 255, " + shape.opacity + ")";
        ctx.beginPath();

        // Create the shape based on the randomly selected type
        if (shape.type === "circle")
        {
            ctx.arc(shape.x, shape.y, shape.size / 2, 0, Math.PI * 2);
            ctx.fill();
        }
        else if (shape.type === "square")
        {
            ctx.fillRect(shape.x, shape.y, shape.size, shape.size);
        }
        else if (shape.type === "triangle")
        {
            ctx.moveTo(shape.x, shape.y);
            ctx.lineTo(shape.x + shape.size, shape.y);
            ctx.lineTo(shape.x + shape.size / 2, shape.y - shape.size);
            ctx.closePath();
            ctx.fill();
        }
    }

    function animate()
    {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        for (let shape of shapes)
        {
            draw_shape(shape);

            // Move shape upward
            shape.y -= shape.speed;

            // Reset the shape when it reaches the top of screen
            if (shape.y + shape.size < 0)
            {
                generate_shape();
            }
        }

        requestAnimationFrame(animate);
    }

    animate();
});

