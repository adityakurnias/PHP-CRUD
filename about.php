<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-mono overflow-x-hidden h-screen bg-slate-100">

  <nav class="sticky top-0 w-screen h-9 bg-slate-200/10 p-2 px-96 shadow-md flex  justify-between items-center z-10 backdrop-blur">
    <h1 class="font-bold text-xl">Apalah</h1>
    <a href="">Account</a>
  </nav>
  <div class="h-screen w-screen flex justify-center">
    <div class="mx-auto p-4 lg:h-screen flex items-center justify-center">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Blog Entry 1 -->
        <div class="max-w-sm mx-auto relative shadow-md rounded-lg cursor-pointer">
          <img src="img/itachi.jpg" alt="About our Project" class="w-full h-auto object-cover rounded-lg">
          <div class="absolute bottom-0 left-0 right-0 h-40 bg-black bg-opacity-50 backdrop-blur text-white p-4 rounded-b-lg">
            <h1 class="text-2xl font-semibold">POST</h1>
            <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab perspiciatis laboriosam architecto, eos sapiente voluptatem molestiae, porro quia</p>
          </div>
        </div>

        <!-- Blog Entry 2 -->
        <div class="max-w-sm mx-auto relative shadow-md rounded-lg cursor-pointer">
          <img src="img/itachi.jpg" alt="About our Project" class="w-full h-auto object-cover rounded-lg">
          <div class="absolute bottom-0 left-0 right-0 h-40 bg-black bg-opacity-50 backdrop-blur text-white p-4 rounded-b-lg">
            <h1 class="text-2xl font-semibold">Apalah</h1>
            <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab perspiciatis laboriosam architecto, eos sapiente voluptatem molestiae, porro quia</p>
          </div>
        </div>

        <!-- Blog Entry 3 -->
        <div class="max-w-sm mx-auto relative shadow-md rounded-lg cursor-pointer">
          <img src="img/itachi.jpg" alt="About our Project" class="w-full h-auto object-cover rounded-lg">
          <div class="absolute bottom-0 left-0 right-0 h-40 bg-black bg-opacity-50 backdrop-blur text-white p-4 rounded-b-lg">
            <h1 class="text-2xl font-semibold">Apalajh</h1>
            <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab perspiciatis laboriosam architecto, eos sapiente voluptatem molestiae, porro quia</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <h1 class="text-center text-4xl font-bold mb-10">Who Contribution in our Project</h1>
  <div class="flex justify-evenly">
    <img class="w-1/6 rounded-full" src="img/botak.jpg" alt="Adit">
    <img class="w-1/6 rounded-full" src="img/botak.jpg" alt="Adit">
    <img class="w-1/6 rounded-full" src="img/botak.jpg" alt="Adit">
    <img class="w-1/6 rounded-full" src="img/botak.jpg" alt="Adit">
  </div>

  <div class="bg-zinc-500 w-3/6">
    <a href="">Whatsapp</a>
    <a href="">Youtube</a>
    <a href="">Github</a>
  </div>

  <!-- plus di bawah-->
  <div class="fixed bg-slate-100/40 z-10 mb-10 self-end rounded-full flex justify-center items-center hover:translate-y-[-5px] duration-100 backdrop-blur-sm shadow-lg p-2">
    <img onclick="addPopup()" class="" src="./img/add.png" width="40px">
  </div>

  <script src="./js/addPopup.js"></script>
</body>

</html>