// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import {app}  from 'firebase';
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyB6s6DPHPcAeROlOa9vtDFjyhsYnktz6sE",
  authDomain: "agenda-597c8.firebaseapp.com",
  projectId: "agenda-597c8",
  storageBucket: "agenda-597c8.appspot.com",
  messagingSenderId: "203108337127",
  appId: "1:203108337127:web:9240a7a164a33f46a96942"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

export default app;