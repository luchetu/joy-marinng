/*jshint esversion: 6 */
import React from 'react';
import './sign-in.styles.scss';
import { signInWithGoogle } from '../../firebase/firebase.utils';
import CustomButton from '../custom-button/custom-button.component';

class SignIn extends React.Component{
    constructor(props){
        super(props);
        this.state={
        email: '',
        password:'',
        };
    }
    handleSubmit=event=>{
        event.preventDefault();
        this.setState({email: "",password:"",
        })
    }
    handleChange=event=>{
       const {value,name}=event.target;
       this.setState({
           [name]:value
       });
    }
    render(){
        return(
        <div className="sign-in">
            <h2>I already have an account</h2>
            <span>Sign in with your email and password</span>
            <form onSubmit={this.handleSubmit}>
                <input type="email" name="email" value={this.state.email} onChange={this.handleChange} required/>
                <label>Email</label>
                <input type="password" name="password" value={this.state.password} onChange={this.handleChange} required/>
                <label>Password</label>
            <div className="button"> <CustomButton type='submit'> Sign in </CustomButton>
             <CustomButton type='button' onClick={signInWithGoogle} isGoogleSignIn>Sign in with Google</CustomButton></div>
           
      
            </form>
        </div>
)
    }
}
export default SignIn;