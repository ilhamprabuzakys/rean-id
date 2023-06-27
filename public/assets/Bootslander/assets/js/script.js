import * as THREE from 'three';

 // Inisialisasi Three.js
 const scene = new THREE.Scene();
 const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
 const renderer = new THREE.WebGLRenderer();
 renderer.setSize(window.innerWidth, window.innerHeight);
 document.getElementById('canvas').appendChild(renderer.domElement);

 // Menambahkan cahaya
 const light = new THREE.AmbientLight(0xffffff);
 scene.add(light);

 // Memuat model GLTF
 const loader = new THREE.GLTFLoader();
 loader.load('assets/model/model.gltf', function (gltf) {
   scene.add(gltf.scene);
 });

 // Mengatur posisi kamera
 camera.position.z = 5;

 // Fungsi animasi render
 function animate() {
   requestAnimationFrame(animate);
   renderer.render(scene, camera);
 }

 animate();