<?php

namespace App\DataFixtures;

use App\Entity\Caracteristic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CaracteristicFixtures extends Fixture
{
    public const CARACTERISTICS = [
        'piscine' => '<svg fill="#000000" viewBox="0 0 32 32" id="template" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><path d="M3,5.6a.354.354,0,0,0,.355-.354,2.069,2.069,0,1,1,4.137,0V20.948a.355.355,0,1,0,.709,0V17.966H19.1v2.982a.355.355,0,1,0,.709,0V5.242a2.778,2.778,0,1,0-5.556,0,.355.355,0,0,0,.709,0,2.069,2.069,0,1,1,4.138,0v6.287H8.2V5.242a2.778,2.778,0,1,0-5.555,0A.353.353,0,0,0,3,5.6Zm5.2,6.642H19.1v5.019H8.2Z"></path><path d="M2,25.42a4.162,4.162,0,0,0,3.539-2.147A4.215,4.215,0,0,0,9.1,25.42a4.106,4.106,0,0,0,3.449-2.007A4.16,4.16,0,0,0,16.02,25.42,4.149,4.149,0,0,0,19.539,23.3,4.2,4.2,0,0,0,23.08,25.42a4.1,4.1,0,0,0,3.449-2.007A4.162,4.162,0,0,0,30,25.42a.355.355,0,0,0,0-.709,3.681,3.681,0,0,1-3.149-2.163.3.3,0,0,0-.032-.045.346.346,0,0,0-.044-.062.352.352,0,0,0-.064-.045c-.016-.009-.028-.023-.045-.031h-.007a.431.431,0,0,0-.049-.011.343.343,0,0,0-.222.013h-.005c-.013.006-.021.017-.034.024a.385.385,0,0,0-.074.053.315.315,0,0,0-.042.061.3.3,0,0,0-.032.047,3.671,3.671,0,0,1-3.121,2.159,3.681,3.681,0,0,1-3.149-2.163.493.493,0,0,0-.791,0,3.668,3.668,0,0,1-3.12,2.159,3.682,3.682,0,0,1-3.15-2.163.244.244,0,0,0-.032-.045.3.3,0,0,0-.044-.063.4.4,0,0,0-.064-.044.45.45,0,0,0-.045-.031h-.006a.333.333,0,0,0-.053-.011.337.337,0,0,0-.22.014h0c-.01,0-.016.013-.025.018a.327.327,0,0,0-.084.059.281.281,0,0,0-.039.058.249.249,0,0,0-.035.05A3.668,3.668,0,0,1,9.1,24.711a3.683,3.683,0,0,1-3.15-2.163.35.35,0,0,0-.411-.193.349.349,0,0,0-.418.2A3.671,3.671,0,0,1,2,24.711a.355.355,0,0,0,0,.709Z"></path><path d="M30,28.827a3.681,3.681,0,0,1-3.149-2.163,3.429,3.429,0,0,1-.076-.107.43.43,0,0,0-.062-.043.4.4,0,0,0-.047-.033h-.007a.505.505,0,0,0-.056-.012.384.384,0,0,0-.081-.015l-.008,0a.355.355,0,0,0-.126.027h-.005a.355.355,0,0,0-.031.023.323.323,0,0,0-.077.054.3.3,0,0,0-.041.06.272.272,0,0,0-.033.048,3.671,3.671,0,0,1-3.121,2.159,3.681,3.681,0,0,1-3.149-2.163.493.493,0,0,0-.791,0,3.668,3.668,0,0,1-3.12,2.159,3.682,3.682,0,0,1-3.15-2.163.269.269,0,0,0-.031-.044.352.352,0,0,0-.045-.064.322.322,0,0,0-.062-.042.306.306,0,0,0-.047-.033h-.006a.413.413,0,0,0-.061-.013.347.347,0,0,0-.212.016h0a.2.2,0,0,0-.023.017.369.369,0,0,0-.087.061.294.294,0,0,0-.037.055.371.371,0,0,0-.036.052A3.668,3.668,0,0,1,9.1,28.827a3.683,3.683,0,0,1-3.15-2.163.352.352,0,0,0-.412-.193.349.349,0,0,0-.417.2A3.671,3.671,0,0,1,2,28.827a.355.355,0,0,0,0,.709,4.162,4.162,0,0,0,3.539-2.147A4.215,4.215,0,0,0,9.1,29.536a4.106,4.106,0,0,0,3.449-2.007,4.16,4.16,0,0,0,3.471,2.007,4.149,4.149,0,0,0,3.519-2.116,4.2,4.2,0,0,0,3.541,2.116,4.1,4.1,0,0,0,3.449-2.007A4.162,4.162,0,0,0,30,29.536a.355.355,0,0,0,0-.709Z"></path></g></svg>',
        'cuisine américaine' => '<svg fill="#000000" viewBox="0 -10.41 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 102.06" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M33.5,3.86H3.86v22.75h29.65L33.5,3.86L33.5,3.86L33.5,3.86z M37.1,0h81.91c0.47,0,0.92,0.09,1.33,0.27 c0.42,0.18,0.81,0.44,1.13,0.76l0.02,0.02c0.32,0.32,0.58,0.71,0.75,1.13c0.17,0.41,0.27,0.86,0.27,1.33v23.47 c0,0.47-0.09,0.92-0.27,1.34c-0.18,0.43-0.44,0.81-0.76,1.14l-0.04,0.03c-0.32,0.31-0.69,0.56-1.1,0.73 c-0.41,0.17-0.86,0.27-1.33,0.27H86.05c-0.15,0-0.26-0.12-0.26-0.26V3.86H69.05v6.9l12.3,13.99c0.35,0.4,0.51,0.9,0.48,1.4 c-0.03,0.49-0.25,0.97-0.65,1.33l-0.02,0.01c-0.18,0.15-0.37,0.27-0.58,0.34c-0.21,0.08-0.44,0.12-0.66,0.12l-36.95,0 c-0.53,0-1.02-0.22-1.36-0.57c-0.35-0.35-0.57-0.83-0.57-1.36c0-0.28,0.06-0.54,0.17-0.78c0.11-0.25,0.27-0.47,0.47-0.65 l12.66-13.84V3.86H37.37V30.2c0,0.15-0.12,0.26-0.26,0.26H3.5c-0.47,0-0.92-0.09-1.33-0.27c-0.43-0.18-0.81-0.44-1.14-0.76 c-0.32-0.32-0.58-0.71-0.76-1.14C0.09,27.89,0,27.44,0,26.97V3.5c0-0.47,0.09-0.92,0.27-1.34C0.44,1.73,0.7,1.35,1.03,1.03 C1.04,1.01,1.05,1,1.06,1c0.32-0.31,0.69-0.56,1.1-0.73C2.58,0.09,3.03,0,3.5,0H37.1L37.1,0z M3.5,52.33h115.88 c0.47,0,0.92,0.1,1.33,0.27c0.43,0.18,0.81,0.44,1.14,0.76l0.01,0.01c0.32,0.32,0.57,0.7,0.75,1.12c0.17,0.41,0.27,0.86,0.27,1.34 v42.66c0,0.47-0.1,0.92-0.27,1.33c-0.17,0.41-0.42,0.78-0.72,1.1c-0.01,0.01-0.02,0.03-0.03,0.04l-0.01,0.01 c-0.32,0.32-0.7,0.58-1.13,0.75c-0.41,0.17-0.86,0.27-1.33,0.27H87.99c-0.08,0.02-0.16,0.04-0.25,0.06c-0.1,0.02-0.2,0.02-0.3,0.02 c-0.1,0-0.2-0.01-0.3-0.02c-0.09-0.01-0.17-0.03-0.25-0.06h-50.9c-0.08,0.02-0.16,0.04-0.25,0.06c-0.1,0.02-0.2,0.02-0.3,0.02 c-0.1,0-0.2-0.01-0.3-0.02c-0.09-0.01-0.17-0.03-0.25-0.06H3.5c-0.47,0-0.92-0.09-1.33-0.27c-0.41-0.17-0.79-0.42-1.1-0.73 c-0.02-0.01-0.03-0.02-0.04-0.04c-0.32-0.32-0.58-0.71-0.76-1.13C0.09,99.41,0,98.96,0,98.49V55.83c0-0.47,0.09-0.92,0.27-1.34 c0.18-0.43,0.44-0.81,0.76-1.14c0.01-0.01,0.02-0.02,0.04-0.03c0.32-0.31,0.69-0.56,1.1-0.73C2.58,52.42,3.03,52.33,3.5,52.33 L3.5,52.33z M119.02,56.19H89.37v41.94h29.65V56.19L119.02,56.19z M85.51,56.19H37.37v9.34h48.14V56.19L85.51,56.19z M33.51,56.19 H3.86v41.94h29.65V56.19L33.51,56.19z M37.37,98.12h48.14V69.4H37.37V98.12L37.37,98.12z M65.19,3.86H58.2v7.62 c0,0.02,0,0.04-0.01,0.07c-0.01,0.21-0.05,0.43-0.13,0.63c-0.08,0.22-0.21,0.42-0.37,0.6L47.34,24.09h28.3L65.71,12.8 c-0.16-0.17-0.3-0.38-0.39-0.6c-0.09-0.22-0.14-0.47-0.14-0.72V3.86L65.19,3.86z M93.98,58.35c0.28,0,0.55,0.06,0.79,0.16 l0.01,0.01c0.25,0.1,0.47,0.26,0.66,0.44c0.19,0.19,0.34,0.42,0.45,0.67c0.1,0.24,0.16,0.51,0.16,0.79c0,0.28-0.06,0.54-0.16,0.79 c-0.11,0.25-0.26,0.48-0.45,0.67l-0.02,0.01c-0.19,0.18-0.41,0.33-0.66,0.43c-0.24,0.1-0.51,0.16-0.79,0.16 c-0.28,0-0.55-0.06-0.79-0.16c-0.24-0.1-0.46-0.25-0.65-0.43l-0.03-0.02c-0.19-0.19-0.34-0.42-0.44-0.67l-0.01-0.01 c-0.1-0.24-0.15-0.5-0.15-0.78c0-0.28,0.06-0.55,0.16-0.79c0.1-0.25,0.26-0.48,0.45-0.67c0.19-0.19,0.42-0.34,0.67-0.45l0.01-0.01 C93.45,58.4,93.71,58.35,93.98,58.35L93.98,58.35z M22.09,5.8c0.28,0,0.55,0.06,0.79,0.16c0.25,0.1,0.48,0.26,0.67,0.45 C23.74,6.6,23.9,6.83,24,7.08c0.1,0.24,0.16,0.51,0.16,0.79c0,0.28-0.06,0.55-0.16,0.79c-0.1,0.25-0.25,0.47-0.43,0.65l-0.03,0.03 c-0.19,0.18-0.41,0.33-0.66,0.43c-0.24,0.1-0.51,0.16-0.79,0.16c-0.28,0-0.54-0.06-0.79-0.16c-0.25-0.1-0.48-0.26-0.67-0.45 l-0.02-0.02c-0.18-0.19-0.33-0.41-0.43-0.65c-0.1-0.24-0.16-0.51-0.16-0.79s0.06-0.55,0.16-0.79l0.01-0.01 c0.1-0.25,0.26-0.47,0.44-0.66c0.19-0.19,0.42-0.34,0.67-0.45l0.01-0.01C21.56,5.86,21.82,5.8,22.09,5.8L22.09,5.8z M89.78,3.86 h-0.13v22.75h29.01V3.86H89.78L89.78,3.86z M98.98,6.39c0.19-0.18,0.41-0.33,0.66-0.43c0.24-0.1,0.51-0.16,0.79-0.16 c0.28,0,0.55,0.06,0.79,0.16l0.01,0.01c0.25,0.1,0.47,0.26,0.66,0.44c0.19,0.19,0.34,0.42,0.45,0.67c0.1,0.24,0.16,0.51,0.16,0.79 c0,0.28-0.06,0.55-0.16,0.79l-0.01,0.01c-0.1,0.24-0.25,0.46-0.43,0.64l-0.03,0.03c-0.19,0.18-0.41,0.33-0.65,0.43 c-0.24,0.1-0.51,0.16-0.79,0.16c-0.28,0-0.55-0.06-0.79-0.16c-0.25-0.1-0.48-0.26-0.67-0.45l0,0c-0.19-0.19-0.34-0.42-0.45-0.67 c-0.1-0.24-0.16-0.51-0.16-0.79s0.06-0.54,0.16-0.79c0.11-0.25,0.26-0.48,0.45-0.67L98.98,6.39L98.98,6.39z M28.45,58.35 c0.28,0,0.55,0.06,0.79,0.16l0.01,0.01c0.25,0.11,0.47,0.26,0.66,0.44l0.01,0.02c0.18,0.19,0.33,0.41,0.43,0.65l0.01,0.01 c0.1,0.24,0.15,0.5,0.15,0.78c0,0.28-0.06,0.54-0.16,0.79c-0.11,0.25-0.26,0.48-0.45,0.67l-0.02,0.01 c-0.19,0.18-0.41,0.33-0.66,0.43c-0.24,0.1-0.51,0.16-0.79,0.16c-0.28,0-0.55-0.06-0.79-0.16c-0.25-0.1-0.48-0.26-0.67-0.45l0,0 c-0.19-0.19-0.34-0.42-0.45-0.67l-0.01-0.01c-0.1-0.24-0.15-0.5-0.15-0.78c0-0.28,0.06-0.55,0.16-0.79 c0.1-0.25,0.26-0.48,0.45-0.67c0.19-0.19,0.42-0.34,0.67-0.45C27.91,58.41,28.17,58.35,28.45,58.35L28.45,58.35z"></path> </g> </g></svg>',
        'salle de bain' => '<svg fill="#000000" viewBox="0 -16.33 127.9 127.9" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 127.9 95.25" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M98.97,22.32l-0.06-0.08c-0.31-0.45-0.93-0.55-1.37-0.24l-7.6,5.32c-0.45,0.31-0.55,0.93-0.24,1.37l0.06,0.08 c0.31,0.45,0.93,0.55,1.37,0.24l7.6-5.32C99.17,23.38,99.28,22.76,98.97,22.32L98.97,22.32L98.97,22.32z M119.01,52.32l-4.12,19.22 c-1.02,4.78-3.33,8.43-6.61,10.93c-2.27,1.73-4.98,2.88-8.03,3.45l2.7,5.78c0.58,1.25,0.04,2.74-1.21,3.32 c-1.25,0.58-2.74,0.04-3.32-1.21l-3.5-7.48H35.1l-3.5,7.48c-0.58,1.25-2.07,1.79-3.32,1.21c-1.25-0.58-1.79-2.07-1.21-3.32 l2.55-5.46c-3.9-0.34-7.1-1.59-9.68-3.73c-3.01-2.5-5.07-6.13-6.3-10.86L8.57,52.32H4.61c-1.26,0-2.41-0.52-3.25-1.35l0-0.01 l-0.01,0.01C0.52,50.13,0,48.98,0,47.71v-4.19c0-1.27,0.52-2.42,1.35-3.26c0.06-0.06,0.13-0.13,0.2-0.18 c0.81-0.73,1.88-1.17,3.05-1.17h0.61c0.17-1.82,0.87-3.54,1.95-5.04c1.1-1.54,2.62-2.85,4.35-3.75c1.74-0.91,3.71-1.42,5.7-1.36 c1.75,0.06,3.49,0.54,5.1,1.56c0.7-1.02,1.57-1.93,2.57-2.68c1.96-1.47,4.41-2.35,7.06-2.35c2.2,0,4.26,0.6,6.01,1.64 c1.37,0.81,2.55,1.9,3.47,3.18c2.79,0.22,5.31,1.41,7.2,3.23c1.55,1.5,2.67,3.42,3.16,5.56h67.25V14.1 c-1.46-7.17-5.6-9.12-11.13-8.33c2.49,4.34,2.17,8.75-1.36,13.25c0.45,0.73,0.41,1.53-0.08,2.38l-1.1,1.27 c-0.44,0.45-0.99,0.49-1.7-0.08L86.76,5.52c-0.46-0.55-0.37-1.03,0.17-1.45c1.2-1.47,1.35-1.72,3.48-1.36 c4.74-3.08,9.25-3.63,13.5-1.19c10.67-4.38,19.75,1.12,20.98,12.32l0,0V39.2c0.63,0.23,1.19,0.6,1.65,1.06 c0.83,0.83,1.35,1.99,1.35,3.26v4.19c0,1.27-0.52,2.42-1.35,3.26c-0.83,0.83-1.99,1.35-3.25,1.35H119.01L119.01,52.32z M89.4,14.1 l-0.06-0.08c-0.31-0.45-0.93-0.55-1.37-0.24l-7.6,5.32c-0.45,0.31-0.55,0.93-0.24,1.37l0.06,0.08c0.31,0.45,0.93,0.55,1.37,0.24 l7.6-5.32C89.61,15.16,89.71,14.54,89.4,14.1L89.4,14.1L89.4,14.1z M85.03,9.7l-0.06-0.08c-0.31-0.45-0.93-0.55-1.37-0.24 l-7.6,5.32c-0.45,0.31-0.55,0.93-0.24,1.37l0.06,0.08c0.31,0.45,0.93,0.55,1.37,0.24l7.6-5.32C85.23,10.76,85.34,10.14,85.03,9.7 L85.03,9.7L85.03,9.7z M93.76,18.35l-0.06-0.08c-0.31-0.45-0.93-0.55-1.37-0.24l-7.6,5.32c-0.45,0.31-0.55,0.93-0.24,1.37 l0.06,0.08c0.31,0.45,0.93,0.55,1.37,0.24l7.61-5.32C93.96,19.41,94.07,18.8,93.76,18.35L93.76,18.35L93.76,18.35z M10.29,38.91 h36.25c-0.32-0.74-0.79-1.4-1.37-1.95c-1.19-1.15-2.84-1.86-4.67-1.86c-0.28,0,0.02-0.01-0.17-0.01l-0.17,0.01 c-0.94,0.04-1.87-0.45-2.33-1.34c-0.54-1.03-1.38-1.9-2.41-2.51c-1-0.59-2.19-0.94-3.46-0.94c-1.54,0-2.95,0.5-4.06,1.33 c-1.11,0.84-1.94,2.01-2.3,3.35c-0.12,0.51-0.41,0.99-0.85,1.35c-1.07,0.87-2.65,0.71-3.52-0.36c-1.23-1.51-2.71-2.17-4.16-2.22 c-1.1-0.04-2.22,0.26-3.23,0.79c-1.02,0.54-1.92,1.32-2.59,2.24C10.78,37.45,10.44,38.17,10.29,38.91L10.29,38.91z M8.5,43.93 c-0.4,0.1-0.8,0.09-1.18,0h-2.3v3.36h117.86v-3.36H8.5L8.5,43.93z M13.74,52.32l4.74,18.07c0.96,3.68,2.48,6.45,4.66,8.25 c2.13,1.77,5,2.67,8.73,2.67h63.75c3.86,0,7.15-0.95,9.61-2.82c2.34-1.78,3.99-4.45,4.75-7.99l3.9-18.18H13.74L13.74,52.32z"></path> </g> </g></svg>',
        'garage' => '<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="var(--ci-primary-color, #000000)" d="M448,255.454h-.511L407.067,164.5A48.044,48.044,0,0,0,363.2,136H148.8a48.043,48.043,0,0,0-43.863,28.5L64.511,255.454H64a32.036,32.036,0,0,0-32,32v112a32.036,32.036,0,0,0,32,32V472a24.028,24.028,0,0,0,24,24h56a24.028,24.028,0,0,0,24-24V431.454H344V472a24.028,24.028,0,0,0,24,24h56a24.028,24.028,0,0,0,24-24V431.454a32.036,32.036,0,0,0,32-32v-112A32.036,32.036,0,0,0,448,255.454ZM134.175,177.5A16.013,16.013,0,0,1,148.8,168H363.2a16.014,16.014,0,0,1,14.621,9.5l34.646,77.953H99.529ZM136,464H96V431.454h40Zm280,0H376V431.454h40Zm32-64.546H64v-112H448Z" class="ci-primary"></path> <rect width="80" height="32" x="96" y="328" fill="var(--ci-primary-color, #000000)" class="ci-primary"></rect> <rect width="80" height="32" x="336" y="328" fill="var(--ci-primary-color, #000000)" class="ci-primary"></rect> <polygon fill="var(--ci-primary-color, #000000)" points="256 14.758 16 111.121 16 145.604 256 49.242 496 145.604 496 111.121 256 14.758" class="ci-primary"></polygon> </g></svg>',
        'cave' => '<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#000000" d="M266.5 45.39c-19.9 0-39.8 1.51-59.7 4.51-29.6 26.08-45.4 71.3-45.4 115.4 0 20.2 3.3 39.8 9.6 57 6.5-.3 12.9-.5 19.4-.5 18.5-.8 31.2 0 46.6 2.6-6.1-18.4-9.1-38.7-9.1-59.1 0-43.7 13.6-89.1 42.1-119.83h-3.5zm28.9 1.14c-32.3 25.42-49.5 72.67-49.5 118.77 0 22.2 3.9 43.6 11.5 61.9 12 1.9 23.9 4.3 35.9 7.2 5.8.2 11.5 1.4 16.9 3.4-12-21.2-19-48.7-19-78.8 0-31.8 7.8-60.77 21.1-82.38 6.2-10.15 13.9-18.81 22.6-25.13-13.2-2.3-26.3-3.97-39.5-4.96zm-118.3 8.95c-3.2.74-6.5 1.51-9.8 2.33l-.4.1-.3.1C96.79 69.64 80.62 173.7 118.1 228.1c11.4-2 22.8-3.5 34.2-4.6-5.9-18.1-8.9-38.1-8.9-58.2 0-39.2 10.9-79.7 33.7-109.82zm190.7 2.71c-14.7 0-29 9.74-40.1 27.87-11.2 18.14-18.5 44.14-18.5 72.94 0 28.8 7.3 54.8 18.5 72.9 11.1 18.2 25.4 27.9 40.1 27.9 14.7 0 29-9.7 40.1-27.9 11.2-18.1 18.5-44.1 18.5-72.9 0-28.8-7.3-54.8-18.5-72.94-11.1-18.13-25.4-27.87-40.1-27.87zm-.1 134.01h.2c7.2.1 11.6 5.3 13.9 10 2.3 4.7 3.4 10 3.4 15.9s-1.1 11.2-3.4 15.9c-2.3 4.7-6.7 9.9-13.9 10h-.2c-7.2-.1-11.6-5.3-13.9-10-2.3-4.7-3.4-10-3.4-15.9s1.1-11.2 3.4-15.9c2.3-4.7 6.7-9.9 13.9-10zm-177.3 47.5c-19.8 0-39.7 1.5-59.6 4.5-29.6 26.1-45.45 71.2-45.45 115.3 0 42 14.04 81.3 40.35 101.9 21.1 3.4 42.2 5.2 63.2 5.2-25-25.9-37-66.3-37-107 0-43.8 13.5-89.2 42.1-119.9zm29 1.1c-32.4 25.4-49.6 72.7-49.6 118.8 0 45 16.2 87 46.5 106.2 14.2-1 28.4-2.7 42.6-5.1-8.7-6.4-16.3-15-22.5-25.1-13.3-21.7-21.1-50.6-21.1-82.4 0-31.8 7.8-60.7 21.1-82.3 6.2-10.1 13.8-18.8 22.4-25.1-13.2-2.3-26.3-4-39.4-5zM101 249.9c-3.31.7-6.5 1.5-9.73 2.3h-.43l-.31.1c-90.831 15.1-90.831 186.8 0 201.9l.31.1h.43l3.65.9c-18.61-25.6-27.52-60.5-27.52-95.7 0-39.1 10.88-79.6 33.6-109.6zm190.8 2.5c-14.7 0-28.9 9.8-40.1 27.9-11.2 18.1-18.5 44.1-18.5 72.9 0 28.9 7.3 54.8 18.5 73 11.2 18.1 25.4 27.9 40.1 27.9 14.7 0 28.9-9.8 40.1-27.9 11.2-18.2 18.5-44.1 18.5-73 0-28.8-7.3-54.8-18.5-72.9-11.2-18.1-25.4-27.9-40.1-27.9zm139 0c-8.9.1-17.7 3.7-25.8 10.7-.2.2-.4.4-.6.5-4.9 4.4-9.5 10-13.6 16.8-11.1 18.1-18.4 44-18.4 72.8 0 28.8 7.3 54.8 18.5 72.9C402 444.3 416.3 454 431 454c14.7 0 29-9.7 40.1-27.9 11.2-18.1 18.5-44.1 18.5-72.9 0-28.8-7.3-54.8-18.5-72.9-11.1-18.2-25.4-27.9-40.1-27.9zm-139 134.1c7.2 0 11.7 5.2 14.1 9.9 2.3 4.7 3.3 10 3.3 16 0 5.9-1 11.3-3.3 15.9-2.4 4.8-6.9 9.9-14.1 9.9-7.2 0-11.7-5.1-14-9.9-2.4-4.6-3.4-10-3.4-15.9 0-6 1-11.3 3.4-16 2.3-4.7 6.8-9.9 14-9.9zm139.1 0h.2c7.2.1 11.6 5.3 13.9 10 2.3 4.7 3.4 10 3.4 15.9s-1.1 11.2-3.4 15.9c-2.3 4.7-6.7 9.9-13.9 10h-.2c-7.2-.1-11.6-5.3-13.9-10-2.3-4.7-3.4-10-3.4-15.9s1.1-11.2 3.4-15.9c2.3-4.7 6.7-9.9 13.9-10zm-69.5 16.8c-3.5 11.9-8.3 22.8-14.1 32.3-8.5 13.6-19.4 24.6-31.9 30.8 27.5.9 55.1-.9 82.6-5.7-8.6-6.3-16.3-15-22.5-25.1-5.8-9.5-10.6-20.4-14.1-32.3z"></path></g></svg>',
    ];

    public function load(ObjectManager $manager): void
    {
        $increment = 0;
        foreach (self::CARACTERISTICS as $name => $icon) {
            $caracteristic = new Caracteristic();
            $caracteristic->setName($name)->setIcon($icon);
            $this->addReference('caracteristic_' . $increment, $caracteristic);

            $manager->persist($caracteristic);
            $increment++;
        }

        $manager->flush();
    }
}
