/*jshint esversion: 6 */
import firebase from 'firebase/app';
import 'firebase/firestore';
import 'firebase/auth';

const config={
     
        apiKey: "AIzaSyCTooxxRWA5ch18txhR2HolUAOgeFxqto4",
        authDomain: "movie-bot-cc1d1.firebaseapp.com",
        databaseURL: "https://movie-bot-cc1d1.firebaseio.com",
        projectId: "movie-bot-cc1d1",
        storageBucket: "movie-bot-cc1d1.appspot.com",
        messagingSenderId: "1077964074530",
        appId: "1:1077964074530:web:b4a24834c19570a22d247b"
      };

firebase.initializeApp(config);
export const createUserProfileDocument = async (userAuth, additionalData) => {
  if (!userAuth) return;

  const userRef = firestore.doc(`users/${userAuth.uid}`);

  const snapShot = await userRef.get();

  if (!snapShot.exists) {
    const { displayName, email } = userAuth;
    const createdAt = new Date();
    try {
      await userRef.set({
        displayName,
        email,
        createdAt,
        ...additionalData
      });
    } catch (error) {
      console.log('error creating user', error.message);
    }
  }

  return userRef;
};
export const auth=firebase.auth();
export const firestore=firebase.firestore();
const provider=new firebase.auth.GoogleAuthProvider();
provider.setCustomParameters({prompt:'select_account'});
export const signInWithGoogle=auth.signInWithPopup(provider);
export default firebase;
