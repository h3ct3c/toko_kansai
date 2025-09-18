@include("layout.header")

<div class="bg-gradient-to-r from-blue-900 to-blue-700 shadow-md hover:shadow-lg transition transform hover:scale-105 py-12">
  <h1 class="text-4xl font-bold text-white text-center">Seluruh koleksi Warna</h1>
  <p class="text-white text-center mt-4">Temukan Warna favorit Anda!</p>
</div>

<div class="mb-24"></div>

<div class="p-4 bg-[#f1f2f6] rounded-md">
  <!-- Grid kategori utama -->
  <div class="grid grid-cols-5 lg:grid-cols-7 gap-4">
    
    <!-- Neutral -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('neutralRow')">
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: rgb(181, 172, 150);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Neutral</p>
      </div>
    </div>

    <!-- Red -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('redRow')">
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: rgb(237, 32, 36);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Red</p>
      </div>
    </div>

    <!-- Orange -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('orangeRow')">
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: rgb(250, 164, 26);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Orange</p>
      </div>
    </div>

    <!-- Yellow -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('yellowRow')">
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: rgb(246, 235, 20);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Yellow</p>
      </div>
    </div>

    <!-- Green -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('greenRow')">
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: rgb(11, 129, 64);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Green</p>
      </div>
    </div>

    <!-- Blue -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('blueRow')">
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: rgb(57, 83, 164);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Blue</p>
      </div>
    </div>

    <!-- Purple -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('purpleRow')">
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: rgb(124, 39, 125);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Purple</p>
      </div>
    </div>
  </div>

  <!-- Neutral -->
     @php
    $neutralColors = [
      'rgb(239, 237, 229)', 'rgb(241, 242, 233)', 'rgb(229, 235, 232)',
      'rgb(239, 234, 228)', 'rgb(240, 233, 221)', 'rgb(239, 231, 217)',
      'rgb(238, 235, 224)', 'rgb(244, 235, 215)', 'rgb(241, 237, 223)',
      'rgb(233, 228, 215)', 'rgb(234, 229, 215)', 'rgb(233, 226, 211)',
      'rgb(234, 225, 209)', 'rgb(236, 225, 200)', 'rgb(238, 225, 202)',
      'rgb(229, 216, 192)', 'rgb(234, 219, 200)', 'rgb(233, 219, 200)',
      'rgb(228, 223, 211)', 'rgb(224, 217, 204)', 'rgb(229, 221, 207)',
      'rgb(216, 205, 190)', 'rgb(200, 188, 173)', 'rgb(174, 158, 140)',
      'rgb(230, 229, 220)', 'rgb(228, 220, 207)', 'rgb(208, 197, 180)',
      'rgb(209, 196, 180)', 'rgb(194, 176, 158)', 'rgb(177, 158, 139)',
      'rgb(226, 216, 195)', 'rgb(223, 207, 184)', 'rgb(223, 206, 184)',
      'rgb(203, 184, 153)', 'rgb(206, 184, 160)', 'rgb(185, 161, 135)',
      'rgb(223, 218, 200)', 'rgb(205, 207, 203)', 'rgb(175, 179, 178)',
      'rgb(161, 165, 165)', 'rgb(107, 111, 111)', 'rgb(96, 92, 87)',
      'rgb(224, 224, 220)', 'rgb(196, 199, 195)', 'rgb(175, 178, 178)',
      'rgb(141, 145, 145)', 'rgb(95, 99, 100)', 'rgb(69, 71, 72)',
      'rgb(212, 211, 206)', 'rgb(201, 200, 195)', 'rgb(183, 183, 178)',
      'rgb(150, 147, 139)', 'rgb(122, 122, 120)', 'rgb(106, 106, 104)',
      'rgb(223, 225, 217)', 'rgb(210, 215, 209)', 'rgb(174, 178, 170)',
      'rgb(147, 153, 147)', 'rgb(99, 103, 97)', 'rgb(68, 70, 69)',
      'rgb(220, 215, 207)', 'rgb(211, 206, 198)', 'rgb(169, 165, 163)',
      'rgb(149, 146, 144)', 'rgb(113, 108, 107)', 'rgb(77, 70, 68)',
      'rgb(229, 223, 211)', 'rgb(211, 207, 196)', 'rgb(192, 181, 166)',
      'rgb(127, 112, 106)', 'rgb(81, 73, 72)', 'rgb(82, 80, 80)',
      'rgb(213, 218, 207)', 'rgb(209, 218, 215);', 'rgb(198, 206, 200)',
      'rgb(186, 204, 211)', 'rgb(174, 191, 193)', 'rgb(156, 176, 192)',
      'rgb(230, 227, 210)', 'rgb(230, 226, 202)', 'rgb(212, 211, 179)',
      'rgb(193, 191, 160)', 'rgb(183, 183, 159)', 'rgb(176, 178, 162)',
      'rgb(235, 217, 194)', 'rgb(232, 218, 191)', 'rgb(234, 214, 177)',
      'rgb(232, 205, 162)', 'rgb(237, 197, 134)', 'rgb(214, 176, 126)',
      'rgb(235, 221, 210)', 'rgb(233, 213, 193)', 'rgb(229, 199, 174)',
      'rgb(210, 170, 134)', 'rgb(208, 160, 129)', 'rgb(193, 146, 121)',
      'rgb(238, 224, 224)', 'rgb(239, 219, 228)', 'rgb(217, 114, 136)',
      'rgb(183, 73, 70)', 'rgb(179, 66, 76)', 'rgb(143, 72, 74)',
      'rgb(225, 237, 237)', 'rgb(215, 232, 229)', 'rgb(181, 198, 198)',
      'rgb(137, 193, 198)', 'rgb(0, 127, 137)', 'rgb(67, 85, 112)',
      'rgb(255, 0, 238)', 'rgba(255, 238, 238, 0.933)', 'rgb(255, 255, 255)',
    ];
  @endphp

  <div id="neutralRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    @foreach($neutralColors as $color)
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: {{ $color }}"></div>
    @endforeach
  </div>

 <!-- Red -->
@php
  $redColors = [
    'rgb(166, 78, 112)', 'rgb(197, 115, 145)', 'rgb(216, 145, 171)',
    'rgb(229, 170, 191)', 'rgb(235, 195, 208)', 'rgb(237, 216, 221)',
    'rgb(238, 227, 229)', 'rgb(151, 81, 107)', 'rgb(177, 113, 136)',
    'rgb(196, 141, 160)', 'rgb(212, 162, 178)', 'rgb(221, 185, 196)',
    'rgb(230, 205, 211)', 'rgb(235, 220, 223)', 'rgb(132, 80, 98)',
    'rgb(146, 99, 115)', 'rgb(163, 121, 136)', 'rgb(179, 144, 157)',
    'rgb(189, 159, 170)', 'rgb(208, 187, 194)', 'rgb(226, 210, 214)',
    'rgb(111, 78, 89)', 'rgb(126, 97, 106)', 'rgb(144, 117, 126)',
    'rgb(159, 136, 144)', 'rgb(176, 157, 163)', 'rgb(194, 176, 181)',
    'rgb(214, 198, 201)', 'rgb(90, 73, 78)', 'rgb(104, 91, 97)',
    'rgb(129, 114, 119)', 'rgb(145, 130, 133)', 'rgb(165, 150, 154)',
    'rgb(182, 166, 170)', 'rgb(201, 187, 190)', 'rgb(182, 75, 106)',
    'rgb(208, 115, 141)', 'rgb(223, 148, 166)', 'rgb(233, 175, 187)',
    'rgb(238, 194, 203)', 'rgb(239, 212, 217)', 'rgb(239, 229, 228)',
    'rgb(155, 77, 99)', 'rgb(181, 111, 130)', 'rgb(200, 141, 155)',
    'rgb(213, 162, 173)', 'rgb(224, 185, 193)', 'rgb(233, 206, 211)',
    'rgb(235, 221, 222)', 'rgb(140, 80, 94)', 'rgb(149, 96, 111)',
    'rgb(169, 119, 131)', 'rgb(181, 142, 151)', 'rgb(197, 164, 172)',
    'rgb(210, 185, 190)', 'rgb(224, 208, 209)', 'rgb(117, 77, 86)',
    'rgb(129, 96, 102)', 'rgb(146, 118, 124)', 'rgb(161, 136, 140)',
    'rgb(178, 155, 157)', 'rgb(195, 178, 180)', 'rgb(213, 198, 200)',
    'rgb(90, 74, 78)', 'rgb(106, 90, 94)', 'rgb(128, 112, 115)',
    'rgb(145, 130, 134)', 'rgb(163, 149, 152)', 'rgb(182, 166, 167)',
    'rgb(205, 188, 190)', 'rgb(186, 82, 108)', 'rgb(218, 116, 137)',
    'rgb(228, 146, 159)', 'rgb(235, 169, 178)', 'rgb(239, 195, 204)',
    'rgb(241, 213, 217)', 'rgb(241, 230, 229)', 'rgb(165, 80, 98)',
    'rgb(191, 112, 126)', 'rgb(210, 141, 152)', 'rgb(221, 164, 171)',
    'rgb(228, 184, 189)', 'rgb(236, 207, 207)', 'rgb(238, 222, 222)',
    'rgb(141, 80, 92)', 'rgb(155, 99, 109)', 'rgb(174, 121, 130)',
    'rgb(185, 143, 150)', 'rgb(197, 161, 166)', 'rgb(211, 184, 187)',
    'rgb(224, 206, 208)', 'rgb(118, 77, 84)', 'rgb(130, 95, 102)',
    'rgb(149, 117, 121)', 'rgb(164, 137, 141)', 'rgb(178, 155, 158)',
    'rgb(197, 176, 178)', 'rgb(220, 200, 200)', 'rgb(94, 74, 77)',
    'rgb(114, 93, 95)', 'rgb(129, 111, 113)', 'rgb(147, 129, 131)',
    'rgb(163, 147, 149)', 'rgb(183, 167, 169)', 'rgb(200, 185, 186)',
    'rgb(188, 80, 98)', 'rgb(220, 113, 127)', 'rgb(234, 142, 152)',
    'rgb(241, 176, 180)', 'rgb(245, 195, 197)', 'rgb(245, 215, 215)',
    'rgb(242, 230, 229)', 'rgb(173, 81, 93)', 'rgb(193, 111, 121)',
    'rgb(212, 141, 149)', 'rgb(225, 161, 167)', 'rgb(234, 186, 189)',
    'rgb(236, 203, 204)', 'rgb(235, 218, 216)', 'rgb(137, 77, 86)',
    'rgb(161, 99, 107)', 'rgb(175, 121, 125)', 'rgb(191, 141, 146)',
    'rgb(205, 164, 166)', 'rgb(218, 185, 186)', 'rgb(230, 210, 208)',
    'rgb(122, 76, 81)', 'rgb(137, 98, 100)', 'rgb(152, 118, 120)',
    'rgb(166, 138, 139)', 'rgb(181, 157, 158)', 'rgb(197, 175, 174)',
    'rgb(216, 198, 198)', 'rgb(91, 73, 75)', 'rgb(113, 93, 94)',
    'rgb(131, 111, 112)', 'rgb(151, 133, 133)', 'rgb(166, 148, 149)',
    'rgb(184, 167, 167)', 'rgb(202, 187, 187)', 'rgb(201, 84, 96)',
    'rgb(229, 113, 121)', 'rgb(239, 148, 149)', 'rgb(244, 178, 178)',
    'rgb(248, 196, 194)', 'rgb(246, 213, 212)', 'rgb(242, 229, 226)',
    'rgb(179, 82, 89)', 'rgb(204, 112, 115)', 'rgb(220, 143, 145)',
    'rgb(228, 162, 163)', 'rgb(236, 187, 187)', 'rgb(238, 202, 201)',
    'rgb(238, 221, 217)', 'rgb(145, 77, 80)', 'rgb(158, 96, 99)',
    'rgb(180, 119, 122)', 'rgb(197, 138, 141)', 'rgb(207, 165, 164)',
    'rgb(215, 183, 182)', 'rgb(229, 209, 207)', 'rgb(121, 77, 78)',
    'rgb(139, 97, 97)', 'rgb(153, 117, 117)', 'rgb(169, 138, 138)',
    'rgb(187, 160, 159)', 'rgb(199, 177, 175)', 'rgb(221, 200, 198)',
    'rgb(96, 75, 75)', 'rgb(113, 90, 92)', 'rgb(128, 109, 108)',
    'rgb(148, 130, 129)', 'rgb(150, 132, 128)', 'rgb(184, 168, 163)',
    'rgb(201, 187, 183)',
  ];
@endphp

<div id="redRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
  @foreach($redColors as $color)
    <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: {{ $color }}"></div>
  @endforeach
</div>


 <!-- Orange -->
@php
  $orangeColors = [
    'rgb(227, 92, 65)', 'rgb(246, 123, 98)', 'rgb(252, 152, 128)',
    'rgb(252, 178, 158)', 'rgb(253, 195, 178)', 'rgb(249, 215, 205)',
    'rgb(244, 232, 227)', 'rgb(217, 90, 67)', 'rgb(212, 117, 98)',
    'rgb(228, 145, 126)', 'rgb(239, 171, 153)', 'rgb(241, 189, 175)',
    'rgb(240, 207, 197)', 'rgb(235, 222, 216)', 'rgb(167, 84, 64)',
    'rgb(179, 106, 88)', 'rgb(191, 125, 108)', 'rgb(199, 147, 133)',
    'rgb(208, 168, 158)', 'rgb(217, 188, 179)', 'rgb(225, 209, 203)',
    'rgb(133, 84, 71)', 'rgb(145, 103, 94)', 'rgb(162, 123, 113)',
    'rgb(175, 143, 135)', 'rgb(184, 159, 152)', 'rgb(197, 179, 173)',
    'rgb(211, 196, 191)', 'rgb(102, 79, 74)', 'rgb(120, 96, 89)',
    'rgb(135, 114, 108)', 'rgb(152, 134, 128)', 'rgb(166, 151, 145)',
    'rgb(182, 167, 161)', 'rgb(201, 187, 181)', 'rgb(235, 101, 63)',
    'rgb(253, 132, 95)', 'rgb(254, 158, 126)', 'rgb(254, 179, 153)',
    'rgb(252, 199, 179)', 'rgb(249, 216, 204)', 'rgb(243, 231, 224)',
    'rgb(203, 97, 65)', 'rgb(219, 124, 95)', 'rgb(229, 150, 125)',
    'rgb(239, 173, 151)', 'rgb(239, 189, 172)', 'rgb(240, 207, 195)',
    'rgb(237, 223, 216)', 'rgb(171, 91, 66)', 'rgb(177, 108, 87)',
    'rgb(200, 135, 112)', 'rgb(210, 155, 136)', 'rgb(209, 168, 155)',
    'rgb(217, 188, 178)', 'rgb(225, 209, 202)', 'rgb(134, 87, 70)',
    'rgb(150, 107, 92)', 'rgb(163, 125, 113)', 'rgb(174, 143, 132)',
    'rgb(185, 161, 151)', 'rgb(200, 180, 172)', 'rgb(214, 200, 193)',
    'rgb(101, 78, 70)', 'rgb(117, 95, 88)', 'rgb(134, 113, 106)',
    'rgb(150, 132, 125)', 'rgb(165, 149, 142)', 'rgb(183, 168, 161)',
    'rgb(200, 188, 182)', 'rgb(237, 113, 61)', 'rgb(254, 138, 90)',
    'rgb(254, 162, 123)', 'rgb(254, 181, 152)', 'rgb(253, 199, 177)',
    'rgb(246, 219, 205)', 'rgb(243, 233, 225)', 'rgb(210, 106, 65)',
    'rgb(224, 132, 96)', 'rgb(226, 152, 123)', 'rgb(237, 175, 151)',
    'rgb(243, 192, 172)', 'rgb(239, 206, 194)', 'rgb(234, 220, 213)',
    'rgb(171, 96, 67)', 'rgb(183, 116, 89)', 'rgb(201, 137, 111)',
    'rgb(212, 157, 135)', 'rgb(216, 174, 154)', 'rgb(222, 192, 178)',
    'rgb(228, 211, 203)', 'rgb(140, 92, 71)', 'rgb(153, 110, 93)',
    'rgb(160, 126, 110)', 'rgb(175, 145, 133)', 'rgb(184, 161, 150)',
    'rgb(201, 180, 170)', 'rgb(215, 200, 191)', 'rgb(107, 84, 74)',
    'rgb(120, 99, 90)', 'rgb(136, 118, 109)', 'rgb(153, 136, 129)',
    'rgb(168, 153, 145)', 'rgb(183, 168, 161)', 'rgb(203, 190, 183)',
    'rgb(242, 121, 60)', 'rgb(254, 145, 89)', 'rgb(255, 168, 125)',
    'rgb(255, 185, 151)', 'rgb(251, 211, 177)', 'rgb(247, 224, 204)',
    'rgb(244, 238, 229)', 'rgb(218, 142, 69)', 'rgb(231, 158, 97)',
    'rgb(234, 173, 123)', 'rgb(239, 188, 146)', 'rgb(242, 202, 170)',
    'rgb(238, 214, 194)', 'rgb(232, 223, 213)', 'rgb(186, 125, 71)',
    'rgb(187, 137, 93)', 'rgb(199, 154, 114)', 'rgb(207, 169, 137)',
    'rgb(210, 181, 157)', 'rgb(218, 196, 178)', 'rgb(221, 211, 201)',
    'rgb(148, 107, 72)', 'rgb(154, 122, 94)', 'rgb(166, 138, 115)',
    'rgb(176, 154, 135)', 'rgb(186, 165, 151)', 'rgb(199, 183, 172)',
    'rgb(215, 202, 192)', 'rgb(107, 85, 70)', 'rgb(121, 102, 88)',
    'rgb(137, 121, 108)', 'rgb(152, 137, 126)', 'rgb(166, 153, 144)',
    'rgb(183, 171, 162)', 'rgb(201, 190, 180)', 'rgb(255, 161, 66)',
    'rgb(255, 172, 93)', 'rgb(255, 188, 125)', 'rgb(255, 200, 154)',
    'rgb(251, 211, 177)', 'rgb(247, 224, 204)', 'rgb(244, 238, 229)'
  ];
@endphp

<div id="orangeRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
  @foreach($orangeColors as $color)
    <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: {{ $color }}"></div>
  @endforeach
</div>


  <!-- Yellow -->
@php
  $yellowColors = [
    'rgb(255, 165, 60)', 'rgb(255, 181, 92)', 'rgb(255, 194, 126)',
    'rgb(255, 205, 151)', 'rgb(251, 215, 177)', 'rgb(247, 226, 205)',
    'rgb(241, 232, 223)', 'rgb(214, 145, 66)', 'rgb(223, 163, 95)',
    'rgb(235, 179, 124)', 'rgb(235, 192, 148)', 'rgb(237, 203, 168)',
    'rgb(234, 213, 191)', 'rgb(233, 223, 212)', 'rgb(175, 126, 68)',
    'rgb(184, 139, 91)', 'rgb(192, 154, 112)', 'rgb(203, 171, 135)',
    'rgb(207, 181, 156)', 'rgb(216, 195, 175)', 'rgb(222, 210, 199)',
    'rgb(140, 105, 70)', 'rgb(152, 123, 92)', 'rgb(164, 139, 115)',
    'rgb(176, 156, 137)', 'rgb(186, 169, 152)', 'rgb(199, 185, 172)',
    'rgb(214, 201, 190)', 'rgb(107, 89, 72)', 'rgb(120, 105, 90)',
    'rgb(134, 121, 107)', 'rgb(149, 137, 126)', 'rgb(164, 153, 142)',
    'rgb(181, 170, 160)', 'rgb(198, 188, 178)', 'rgb(251, 175, 54)',
    'rgb(248, 185, 91)', 'rgb(255, 201, 126)', 'rgb(255, 210, 152)',
    'rgb(253, 220, 178)', 'rgb(247, 228, 204)', 'rgb(242, 232, 217)',
    'rgb(202, 146, 64)', 'rgb(214, 165, 95)', 'rgb(224, 181, 123)',
    'rgb(231, 193, 147)', 'rgb(234, 204, 168)', 'rgb(234, 215, 193)',
    'rgb(233, 224, 213)', 'rgb(173, 130, 70)', 'rgb(179, 141, 91)',
    'rgb(188, 155, 111)', 'rgb(199, 170, 134)', 'rgb(206, 183, 156)',
    'rgb(215, 196, 175)', 'rgb(222, 210, 198)', 'rgb(139, 110, 73)',
    'rgb(149, 122, 92)', 'rgb(162, 140, 114)', 'rgb(174, 155, 133)',
    'rgb(184, 169, 151)', 'rgb(198, 184, 170)', 'rgb(213, 201, 190)',
    'rgb(106, 90, 73)', 'rgb(116, 107, 88)', 'rgb(133, 124, 108)',
    'rgb(148, 140, 126)', 'rgb(168, 160, 146)', 'rgb(179, 173, 161)',
    'rgb(198, 191, 179)', 'rgb(228, 192, 44)', 'rgb(225, 194, 95)',
    'rgb(235, 207, 131)', 'rgb(240, 218, 158)', 'rgb(242, 225, 181)',
    'rgb(241, 231, 207)', 'rgb(239, 235, 225)', 'rgb(187, 160, 67)',
    'rgb(193, 171, 98)', 'rgb(206, 188, 125)', 'rgb(218, 197, 146)',
    'rgb(223, 207, 168)', 'rgb(230, 219, 192)', 'rgb(231, 226, 214)',
    'rgb(156, 135, 72)', 'rgb(163, 147, 93)', 'rgb(179, 164, 115)',
    'rgb(187, 174, 136)', 'rgb(199, 186, 157)', 'rgb(212, 202, 179)',
    'rgb(223, 216, 202)', 'rgb(130, 115, 74)', 'rgb(138, 126, 93)',
    'rgb(151, 141, 115)', 'rgb(166, 158, 136)', 'rgb(179, 171, 153)',
    'rgb(194, 187, 172)', 'rgb(208, 203, 190)', 'rgb(98, 91, 70)',
    'rgb(115, 108, 90)', 'rgb(130, 125, 110)', 'rgb(145, 141, 127)',
    'rgb(161, 157, 145)', 'rgb(179, 173, 161)', 'rgb(197, 192, 181)',
    'rgb(198, 182, 65)', 'rgb(207, 197, 99)', 'rgb(226, 211, 132)',
    'rgb(230, 219, 159)', 'rgb(238, 228, 182)', 'rgb(239, 233, 208)',
    'rgb(238, 236, 225)', 'rgb(168, 157, 72)', 'rgb(183, 174, 100)',
    'rgb(196, 188, 127)', 'rgb(209, 201, 150)', 'rgb(216, 209, 173)',
    'rgb(223, 218, 194)', 'rgb(225, 222, 210)', 'rgb(144, 137, 73)',
    'rgb(153, 146, 93)', 'rgb(167, 161, 115)', 'rgb(184, 178, 139)',
    'rgb(195, 189, 157)', 'rgb(211, 202, 178)', 'rgb(222, 216, 200)',
    'rgb(118, 114, 74)', 'rgb(133, 127, 95)', 'rgb(145, 142, 115)',
    'rgb(161, 157, 135)', 'rgb(177, 173, 154)', 'rgb(190, 187, 172)',
    'rgb(203, 201, 188)', 'rgb(95, 91, 71)', 'rgb(111, 108, 91)',
    'rgb(125, 122, 106)', 'rgb(142, 139, 125)', 'rgb(159, 156, 144)',
    'rgb(176, 173, 161)', 'rgb(193, 190, 178)', 'rgb(162, 176, 69)',
    'rgb(177, 193, 103)', 'rgb(203, 210, 134)', 'rgb(212, 220, 161)',
    'rgb(223, 227, 183)', 'rgb(231, 232, 208)', 'rgb(238, 238, 227)',
    'rgb(141, 153, 73)', 'rgb(161, 170, 101)', 'rgb(181, 188, 129)',
    'rgb(195, 200, 152)', 'rgb(205, 209, 173)', 'rgb(216, 218, 194)',
    'rgb(226, 227, 213)', 'rgb(123, 132, 73)', 'rgb(140, 147, 95)',
    'rgb(154, 159, 115)', 'rgb(171, 172, 136)', 'rgb(184, 187, 157)',
    'rgb(198, 200, 178)', 'rgb(215, 215, 201)', 'rgb(107, 111, 74)',
    'rgb(122, 124, 93)', 'rgb(138, 140, 113)', 'rgb(151, 155, 133)',
    'rgb(171, 173, 153)', 'rgb(187, 188, 171)', 'rgb(202, 202, 188)',
    'rgb(88, 91, 73)', 'rgb(104, 106, 90)', 'rgb(122, 123, 108)',
    'rgb(139, 141, 127)', 'rgb(156, 157, 144)', 'rgb(174, 175, 162)',
    'rgb(192, 194, 181)'
  ];
@endphp

<div id="yellowRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
  @foreach($yellowColors as $color)
    <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: {{ $color }}"></div>
  @endforeach
</div>


  <!-- Green -->
  @php
    $greenColors = ['#4caf50', '#388e3c', '#2e7d32'];
  @endphp
  <div id="greenRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    @foreach($greenColors as $color)
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: {{ $color }}"></div>
    @endforeach
  </div>

  <!-- Blue -->
  @php
    $blueColors = ['#2196f3', '#1976d2', '#0d47a1'];
  @endphp
  <div id="blueRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    @foreach($blueColors as $color)
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: {{ $color }}"></div>
    @endforeach
  </div>

  <!-- Purple -->
  @php
    $purpleColors = ['#9c27b0', '#7b1fa2', '#4a148c'];
  @endphp
  <div id="purpleRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    @foreach($purpleColors as $color)
      <div class="h-[50px] md:h-[95px] rounded-md" style="background-color: {{ $color }}"></div>
    @endforeach
  </div>
</div>

<div class="mb-[500px]"></div>
@include("layout.footer")

<script>
  function toggleRow(id) {
    // sembunyikan semua row
    document.querySelectorAll('[id$="Row"]').forEach(el => el.classList.add("hidden"));

    // tampilkan row yang dipilih
    const row = document.getElementById(id);
    row.classList.remove("hidden");

    // animasi muncul
    const items = row.children;
    [...items].forEach((item, i) => {
      item.style.opacity = 0;
      setTimeout(() => {
        item.style.transition = "opacity 0.3s ease";
        item.style.opacity = 1;
      }, i * 30);
    });
  }
</script>
