<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - CRM System</title>
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
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Services</h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                    Transform your business with our comprehensive CRM solution. Manage leads, track sales, 
                    and boost productivity with our powerful features and integrations.
                </p>
            </div>
        </div>
        <div class="custom-shape-divider-bottom">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Comprehensive CRM Solution</h2>
                    <p class="text-gray-600 mb-4">
                        Our CRM software is designed to help businesses streamline their customer relationships 
                        and boost operational efficiency. With powerful features and intuitive interfaces, 
                        you can focus on what matters most - growing your business.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Lead and Customer Management</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Task Reminders and Follow-ups</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Revenue Tracking and Reporting</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Team Collaboration Tools</span>
                        </li>
                    </ul>
                </div>
                <div class="relative">
                    <img src="./img/dashboard.png" alt="CRM Dashboard" class="rounded-lg shadow-xl">
                    <div class="absolute -bottom-6 -right-6 bg-blue-600 text-white p-4 rounded-lg">
                        <p class="text-lg font-semibold">24/7 Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Choose Your Plan</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
                <!-- Basic Plan -->
                <div class="pricing-card group">
                    <div class="h-[550px] relative preserve-3d group-hover:rotate-y-180 transition-transform duration-500">
                        <div class="absolute w-full h-full backface-hidden">
                            <div class="h-full bg-white p-8 rounded-2xl shadow-lg">
                                <h3 class="text-2xl font-bold mb-4 text-gray-800">Basic Plan</h3>
                                <div class="text-4xl font-bold mb-4 text-blue-600">₹999<span class="text-lg text-gray-600">/month</span></div>
                                <p class="text-gray-600 mb-8">Perfect for small businesses</p>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Up to 1,000 Contacts</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Basic Analytics</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Email Support</span>
                                    </li>
                                </ul>
                                <button class="w-full py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    Get Started
                                </button>
                            </div>
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <div class="h-full bg-gradient-to-br from-blue-600 to-blue-400 p-8 rounded-2xl shadow-lg text-white">
                                <h3 class="text-2xl font-bold mb-6">Basic Features</h3>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Contact Management</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Task Tracking</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Email Integration</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Basic Reports</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Mobile App Access</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>5GB Storage</span>
                                    </li>
                                </ul>
                                <button class="w-full py-3 px-6 bg-white text-blue-600 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                                    Get Started
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Standard Plan -->
                <div class="pricing-card group">
                    <div class="h-[550px] relative preserve-3d group-hover:rotate-y-180 transition-transform duration-500">
                        <div class="absolute w-full h-full backface-hidden">
                            <div class="h-full bg-white p-8 rounded-2xl shadow-lg">
                                <h3 class="text-2xl font-bold mb-4 text-gray-800">Standard Plan</h3>
                                <div class="text-4xl font-bold mb-4 text-blue-600">₹1,999<span class="text-lg text-gray-600">/month</span></div>
                                <p class="text-gray-600 mb-8">Growing businesses</p>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Up to 5,000 Contacts</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Advanced Analytics</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Priority Support</span>
                                    </li>
                                </ul>
                                <button class="w-full py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    Get Started
                                </button>
                            </div>
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <div class="h-full bg-gradient-to-br from-blue-600 to-blue-400 p-8 rounded-2xl shadow-lg text-white">
                                <h3 class="text-2xl font-bold mb-6">Standard Features</h3>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>All Basic Features</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Sales Forecasting</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Custom Reports</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>API Access</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Team Collaboration</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>20GB Storage</span>
                                    </li>
                                </ul>
                                <button class="w-full py-3 px-6 bg-white text-blue-600 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                                    Get Started
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pro Plan -->
                <div class="pricing-card group popular">
                    <div class="h-[550px] relative preserve-3d group-hover:rotate-y-180 transition-transform duration-500">
                        <div class="absolute w-full h-full backface-hidden">
                            <div class="h-full bg-white p-8 rounded-2xl shadow-lg">
                                <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm">Popular</div>
                                <h3 class="text-2xl font-bold mb-4 text-gray-800">Pro Plan</h3>
                                <div class="text-4xl font-bold mb-4 text-blue-600">₹3,999<span class="text-lg text-gray-600">/month</span></div>
                                <p class="text-gray-600 mb-8">For established teams</p>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Unlimited Contacts</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Premium Analytics</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">24/7 Support</span>
                                    </li>
                                </ul>
                                <button class="w-full py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    Get Started
                                </button>
                            </div>
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <div class="h-full bg-gradient-to-br from-blue-600 to-blue-400 p-8 rounded-2xl shadow-lg text-white">
                                <h3 class="text-2xl font-bold mb-6">Pro Features</h3>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>All Standard Features</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>AI-Powered Insights</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Advanced Automation</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Custom Integrations</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Dedicated Support</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Unlimited Storage</span>
                                    </li>
                                </ul>
                                <button class="w-full py-3 px-6 bg-white text-blue-600 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                                    Get Started
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enterprise Plan -->
                <div class="pricing-card group">
                    <div class="h-[550px] relative preserve-3d group-hover:rotate-y-180 transition-transform duration-500">
                        <div class="absolute w-full h-full backface-hidden">
                            <div class="h-full bg-white p-8 rounded-2xl shadow-lg">
                                <h3 class="text-2xl font-bold mb-4 text-gray-800">Enterprise Plan</h3>
                                <div class="text-4xl font-bold mb-4 text-blue-600">Custom</div>
                                <p class="text-gray-600 mb-8">Large organizations</p>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Custom Solutions</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Enterprise Analytics</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span class="text-gray-600">Dedicated Manager</span>
                                    </li>
                                </ul>
                                <button class="w-full py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    Contact Sales
                                </button>
                            </div>
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <div class="h-full bg-gradient-to-br from-blue-600 to-blue-400 p-8 rounded-2xl shadow-lg text-white">
                                <h3 class="text-2xl font-bold mb-6">Enterprise Features</h3>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>All Pro Features</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Custom Development</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>White Labeling</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Advanced Security</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>SLA Agreement</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-check"></i>
                                        <span>Training & Setup</span>
                                    </li>
                                </ul>
                                <button class="w-full py-3 px-6 bg-white text-blue-600 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                                    Contact Sales
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Services -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Additional Services</h2>
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Custom Integration -->
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-plug text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Custom Integration</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Connect your existing tools and systems with our CRM platform. 
                        Our team will ensure seamless data flow across your tech stack.
                    </p>
                </div>

                <!-- Data Migration -->
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-database text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Data Migration</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Safely migrate your existing customer data to our platform. 
                        We ensure zero data loss and minimal downtime.
                    </p>
                </div>

                <!-- Training & Support -->
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-graduation-cap text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Training & Support</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Get personalized training sessions for your team and ongoing support 
                        to maximize the value of your CRM investment.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <?php include '_Footer.php'; ?>

    <style>
        .custom-shape-divider-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .custom-shape-divider-bottom svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 150px;
        }

        .custom-shape-divider-bottom .shape-fill {
            fill: #f9fafb;
        }

        .pricing-card {
            @apply bg-white rounded-lg shadow-lg overflow-visible transform transition-all duration-300;
            perspective: 2000px;
            height: 600px;
            margin: 20px 0;
        }

        .pricing-card.popular {
            @apply ring-2 ring-blue-600 relative;
        }

        .pricing-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: left;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .pricing-card:hover .pricing-card-inner {
            transform: rotateY(180deg);
        }

        .pricing-card-front, .pricing-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 1rem;
        }

        .pricing-card-front {
            background-color: white;
        }

        .pricing-card-back {
            background: linear-gradient(135deg, #0062ff, #00c6ff);
            transform: rotateY(180deg);
            color: white;
        }

        .btn-primary {
            @apply inline-block bg-white text-blue-600 px-6 py-2 rounded-lg font-semibold hover:bg-blue-50 transition-colors duration-300;
        }

        .service-card {
            @apply bg-white p-8 rounded-lg shadow-lg text-center transform transition-all duration-300 hover:-translate-y-2;
        }

        @layer utilities {
            .preserve-3d {
                transform-style: preserve-3d;
            }
            .backface-hidden {
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
            }
            .rotate-y-180 {
                transform: rotateY(180deg);
            }
        }

        /* Add spacing between pricing cards on mobile */
        @media (max-width: 768px) {
            .pricing-card {
                margin: 30px 0;
            }
        }
    </style>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Animate pricing cards
        gsap.utils.toArray('.pricing-card').forEach((card, i) => {
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

        // Animate service cards
        gsap.utils.toArray('.service-card').forEach((card, i) => {
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