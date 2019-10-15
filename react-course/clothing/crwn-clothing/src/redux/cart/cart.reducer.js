import CartActionTypes from './cart.type';
const INITIAL_STATE={
    hidden:true,
    cartItems:[]
}
const cardReducer=(state=INITIAL_STATE,action){
    switch(CartActionTypes.type){
        case CartActionTypes.caseTOGGLE_CART_HIDDEN:
        return{
            ...state,
            hidden:!state.hidden
        }
       case CartActionTypes.ADD_ITEM:
        return{
            ...state,
            cartItems:[...state.cartItems,action.payload]
           
        }
        default:
            return state;
    }
}
export default cardReducer;