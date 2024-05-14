<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Web Design Mastery | MEDIBuddy</title>
  </head>
  <body class="font-roboto">
    <div class="container mx-auto min-h-screen flex flex-col">
      <nav class="p-8 flex items-center justify-between gap-4">
        <div class="text-2xl font-semibold text-teal-600">MEDIBuddy</div>
        <ul class="hidden md:flex list-none items-center gap-8">
          <li><a href="#" class="text-gray-500 hover:text-teal-600 transition">Home</a></li>
          <li><a href="#" class="text-gray-500 hover:text-teal-600 transition">About Us</a></li>
          <li><a href="#" class="text-gray-500 hover:text-teal-600 transition">Courses</a></li>
          <li><a href="#" class="text-gray-500 hover:text-teal-600 transition">Pages</a></li>
          <li><a href="#" class="text-gray-500 hover:text-teal-600 transition">Blog</a></li>
          <li><a href="#" class="text-gray-500 hover:text-teal-600 transition">Contact</a></li>
        </ul>
        <button class="btn bg-teal-500 text-white px-8 py-4 rounded-md hover:bg-teal-700 transition">Register Now</button>
      </nav>
      <header class="flex-1 p-4 md:p-8 grid md:grid-cols-2 gap-8 items-center">
        <div class="content">
          <h1 class="text-4xl font-bold text-gray-900 mb-4">
            <span class="font-normal">Get Quick</span><br />Medical Services
          </h1>
          <p class="text-gray-500 mb-8 leading-7">
            In today's fast-paced world, access to prompt and efficient medical
            services is of paramount importance. When faced with a medical
            emergency or seeking immediate medical attention, the ability to
            receive quick medical services can significantly impact the outcome
            of a situation.
          </p>
          <button class="btn bg-teal-500 text-white px-8 py-4 rounded-md hover:bg-teal-700 transition">Get Services</button>
        </div>
        <div class="image relative text-center isolate">
          <div class="image__bg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-[450px] w-[450px] bg-teal-500 rounded-full z-[-1]"></div>
          <img src="{{asset('images/notifikasi.png')}}" alt="header image" class="w-full max-w-md" />
          <div class="image__content absolute top-1/2 left-1/2 transform -translate-x-[calc(50%+3rem)] -translate-y-[calc(50%+2rem)] flex items-center gap-4 p-4 bg-white rounded-md shadow-md">
            <span class="text-teal-500 bg-teal-100 p-2 rounded-full text-xl">
              <i class="ri-user-3-line"></i>
            </span>
            <div class="details">
              <h4 class="text-xl font-semibold text-gray-900">1520+</h4>
              <p class="text-gray-500">Active Clients</p>
            </div>
          </div>
          <div class="image__content absolute top-1/2 left-1/2 transform translate-x-[2rem] translate-y-[2.5rem] p-4 bg-white rounded-md shadow-md">
            <ul class="list-none grid gap-4">
              <li class="flex items-start gap-2 text-gray-500">
                <span class="text-xl text-teal-500"><i class="ri-check-line"></i></span>
                Get 20% off on every 1st month
              </li>
              <li class="flex items-start gap-2 text-gray-500">
                <span class="text-xl text-teal-500"><i class="ri-check-line"></i></span>
                Expert Doctors
              </li>
            </ul>
          </div>
        </div>
      </header>
    </div>
  </body>
</html>
