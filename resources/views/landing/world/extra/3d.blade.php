<script async src="https://ga.jspm.io/npm:es-module-shims@1.7.3/dist/es-module-shims.js"></script>
<script type="importmap">
{
   "imports": {
      "three": "https://unpkg.com/three@0.145.0/build/three.module.js"
   }
}
</script>
<script type="module">
   import * as THREE from 'three';
   import { OrbitControls } from 'https://unpkg.com/three@0.145.0/examples/jsm/controls/OrbitControls.js';
   import { GLTFLoader } from 'https://unpkg.com/three@0.145.0/examples/jsm/loaders/GLTFLoader.js';
   
   // Scene renderer
   const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
   renderer.setClearColor(0xffffff, 0);
   const container = document.getElementById('logo-container');
   const object3d = document.getElementById('logo-3d');
   const aspectRatio = container.offsetWidth / container.offsetHeight;
   // Adjust container size to match aspect ratio
   let newWidth, newHeight;
   if (aspectRatio > 1) {
   newWidth = container.offsetWidth;
   newHeight = container.offsetWidth / aspectRatio;
   } else {
   newWidth = container.offsetHeight * aspectRatio;
   newHeight = container.offsetHeight;
   }
   renderer.setSize(500, 450);
   object3d.appendChild(renderer.domElement);
   
   // Our Scene
   const scene = new THREE.Scene();
   // scene.background = new THREE.Color(0xffffff);
   scene.background = null;
   renderer.setClearAlpha(0);
   // scene.background.setAlpha(0);
   
   // Camera angle for Object
   const zoom = 1.5; // Ubah sesuai kebutuhan Anda
   const fov = 11; // Ubah sesuai kebutuhan Anda
   const camera = new THREE.PerspectiveCamera(fov, container.offsetWidth / (container.offsetHeight), 0.5, 500);
   camera.position.set(20, 15, 2); // Ubah posisi kamera untuk tampilan depan objek 3D
   
   // Pretty Ambient Light
   const ambientLight = new THREE.AmbientLight(0xffffff);
   scene.add(ambientLight);
   
   // Pretty Directional Light
   const directionalLight = new THREE.DirectionalLight(0xffffff, 3);
   // scene.add(directionalLight);
   
   // Controls for orbiting around Object
   const controls = new OrbitControls(camera, renderer.domElement);
   // controls.addEventListener('change', () => {
   //    renderer.render(scene, camera);
   // });
   // controls.target.set(0,0,0);
   // controls.update();
   
   controls.enablePan = true; // Menonaktifkan panning (geser kamera)
   controls.enableRotate = true; // Mengaktifkan rotasi
   controls.enableZoom = false; // Menonaktifkan zoom
   // controls.minAzimuthAngle = -Math.PI; // Batas sudut minimum putaran (ke kiri)
   // controls.maxAzimuthAngle = Math.PI; // Batas sudut maksimum putaran (ke kanan)
   // controls.minPolarAngle = 100; // Batas sudut minimum polar (ke atas)
   // controls.maxPolarAngle = 100; // Batas sudut maksimum polar (ke bawah)
   controls.addEventListener('change', () => {
      renderer.render(scene, camera);
   });
   controls.target.set(0,0.9,0);
   controls.update();

   // Load use GL Object
   const loader = new GLTFLoader();
   loader.load('models/rean-old.gltf', function(gltf) {
      const model = gltf.scene;
      model.position.set(0, 0, 0);
      model.rotation.set(0, Math.PI - 1.67, 0); // Set rotation to face forward
      scene.add(model);
   
      renderer.render(scene, camera);
   }, undefined, function(error) {
      console.log("error: " + error);
   })
   
   // Update scene on window resize
   window.onresize = function() {
      const aspectRatio = container.offsetWidth / container.offsetHeight;
      // Adjust container size to match aspect ratio
      let newWidth, newHeight;
      if (aspectRatio > 1) {
      newWidth = container.offsetWidth;
      newHeight = container.offsetWidth / aspectRatio;
      } else {
      newWidth = container.offsetHeight * aspectRatio;
      newHeight = container.offsetHeight;
      }
      renderer.setSize(newWidth, newHeight);
      camera.aspect = aspectRatio;
      camera.updateProjectionMatrix();

      renderer.setSize(newWidth, newHeight);
   }
   
</script>
