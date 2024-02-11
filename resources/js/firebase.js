// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBVhZ2hjyvI9q8HGWBXBWprgBlv8yFUh84",
    authDomain: "ecomashub-2024.firebaseapp.com",
    projectId: "ecomashub-2024",
    storageBucket: "ecomashub-2024.appspot.com",
    messagingSenderId: "225859146298",
    appId: "1:225859146298:web:8b81c120db3835c03c1b03",
    measurementId: "G-730JN7SZ4T"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
