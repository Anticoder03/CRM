<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - CRM System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="bg-gray-50">
    <?php include '_Nav.php'; ?>

    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-blue-600 to-blue-400">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Ashish Prajapati</h1>
                    <p class="text-xl mb-2">@Anticoder03</p>
                    <p class="text-blue-100 mb-6">Full Stack Developer & BCA Student</p>
                    <a href="https://github.com/Anticoder03" target="_blank" 
                       class="inline-flex items-center space-x-2 bg-white text-blue-600 px-6 py-3 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                        <i class="fab fa-github"></i>
                        <span>View on GitHub</span>
                    </a>
                </div>
                <div class="md:w-1/2 mt-8 md:mt-0">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Personal Details</h3>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-calendar text-blue-600"></i>
                                <span>Age: 19 years</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-birthday-cake text-blue-600"></i>
                                <span>DOB: 03/03/2005</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-envelope text-blue-600"></i>
                                <span>Email: ap5381545@gmail.com</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-phone text-blue-600"></i>
                                <span>Contact: +91 9876543210</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Description -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">About The Project</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Project Purpose</h3>
                    <p class="text-gray-600 leading-relaxed">
                        This CRM system was developed as my BCA final year project with the goal of creating a comprehensive 
                        solution for businesses to manage their customer relationships effectively. The system streamlines 
                        customer data management, automates routine tasks, and provides valuable insights for better 
                        decision-making.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Personal Philosophy</h3>
                    <div class="text-gray-600 leading-relaxed">
                        <p class="text-xl font-semibold text-blue-600 mb-4">"There is no place like 127.0.0.1"</p>
                        <p>
                            I believe in creating solutions that not only solve problems but also enhance the user experience. 
                            My approach to coding focuses on clean, maintainable code and user-centric design.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Technical Skills</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Frontend Skills -->
                <div class="skill-card">
                    <h3 class="text-xl font-semibold mb-4">Frontend</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-badge bg-yellow-100 text-yellow-800">HTML</span>
                        <span class="skill-badge bg-blue-100 text-blue-800">CSS</span>
                        <span class="skill-badge bg-yellow-100 text-yellow-800">JavaScript</span>
                        <span class="skill-badge bg-blue-100 text-blue-800">jQuery</span>
                        <span class="skill-badge bg-indigo-100 text-indigo-800">Tailwind</span>
                        <span class="skill-badge bg-purple-100 text-purple-800">Bootstrap</span>
                    </div>
                </div>

                <!-- Backend Skills -->
                <div class="skill-card">
                    <h3 class="text-xl font-semibold mb-4">Backend</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-badge bg-purple-100 text-purple-800">PHP</span>
                        <span class="skill-badge bg-green-100 text-green-800">Django</span>
                        <span class="skill-badge bg-gray-100 text-gray-800">Flask</span>
                        <span class="skill-badge bg-blue-100 text-blue-800">React</span>
                    </div>
                </div>

                <!-- Database Skills -->
                <div class="skill-card">
                    <h3 class="text-xl font-semibold mb-4">Database</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-badge bg-orange-100 text-orange-800">MySQL</span>
                    </div>
                </div>

                <!-- Programming Languages -->
                <div class="skill-card">
                    <h3 class="text-xl font-semibold mb-4">Languages</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-badge bg-blue-100 text-blue-800">Python</span>
                        <span class="skill-badge bg-red-100 text-red-800">Java</span>
                        <span class="skill-badge bg-gray-100 text-gray-800">C</span>
                        <span class="skill-badge bg-blue-100 text-blue-800">C++</span>
                    </div>
                </div>

                <!-- Tools -->
                <div class="skill-card">
                    <h3 class="text-xl font-semibold mb-4">Tools</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-badge bg-orange-100 text-orange-800">Git</span>
                        <span class="skill-badge bg-gray-100 text-gray-800">GitHub</span>
                        <span class="skill-badge bg-blue-100 text-blue-800">VS Code</span>
                    </div>
                </div>

                <!-- Operating Systems -->
                <div class="skill-card">
                    <h3 class="text-xl font-semibold mb-4">Operating Systems</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-badge bg-orange-100 text-orange-800">Linux</span>
                        <span class="skill-badge bg-purple-100 text-purple-800">Ubuntu</span>
                        <span class="skill-badge bg-red-100 text-red-800">Parrot OS</span>
                        <span class="skill-badge bg-blue-100 text-blue-800">Windows</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hobbies Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Hobbies & Interests</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="hobby-card">
                    <i class="fas fa-chess text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold">Playing Chess</h3>
                </div>
                <div class="hobby-card">
                    <i class="fas fa-music text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold">Listening to Music</h3>
                </div>
                <div class="hobby-card">
                    <i class="fas fa-plane text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold">Traveling</h3>
                </div>
                <div class="hobby-card">
                    <i class="fas fa-code text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold">Coding</h3>
                </div>
            </div>
        </div>
    </section>

    <?php include '_Footer.php'; ?>

    <style>
        .skill-card {
            @apply bg-white p-6 rounded-lg shadow-md;
        }

        .skill-badge {
            @apply px-3 py-1 rounded-full text-sm font-medium;
        }

        .hobby-card {
            @apply bg-white p-6 rounded-lg shadow-md text-center transition-transform duration-300 hover:-translate-y-2;
        }
    </style>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Animate skill cards
        gsap.utils.toArray('.skill-card').forEach((card, i) => {
            gsap.from(card, {
                y: 50,
                opacity: 0,
                duration: 0.8,
                scrollTrigger: {
                    trigger: card,
                    start: 'top bottom-=100',
                    toggleActions: 'play none none reverse'
                },
                delay: i * 0.1
            });
        });

        // Animate hobby cards
        gsap.utils.toArray('.hobby-card').forEach((card, i) => {
            gsap.from(card, {
                y: 50,
                opacity: 0,
                duration: 0.8,
                scrollTrigger: {
                    trigger: card,
                    start: 'top bottom-=100',
                    toggleActions: 'play none none reverse'
                },
                delay: i * 0.1
            });
        });
    </script>
</body>
</html> 