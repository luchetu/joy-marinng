/*jshint esversion: 6 */
import React from 'react';
import './App.css';
import {Switch,Route} from 'react-router-dom';
import HomePage from './pages/homepage/homepage.component';
import ShopPage from './pages/shop/shop.component';
import Header from './components/header/header.component';
import SignInAndSignOut from './pages/sign-in-and-sign-up/sign-in-and-sign-up';
import { auth} from './firebase/firebase.utils';

class App extends React.Component{
  constructor(){
    super();
    this.state={
      currentUser:null
    };
  
  }
  unsubscribeFromAuth = null;

    this.componentDidMount(){
      this.unsubcsribeFromAuth= auth.onAuthStateChanged(user=>{
        this.setState({currentUser:user});
      })

    }
    componentWillUnmount() {
      unsubcsribeFromAuth();
    }
    
  render(){return (
    <div>
    <Header/>
    <Switch>
    <Route exact path='/' component={HomePage}/>
    <Route path='/shop' component={ShopPage}/>
    <Route path='/signin' component={SignInAndSignOut}/>
    </Switch>
    
    </div>
  );}
  
}

export default App;
