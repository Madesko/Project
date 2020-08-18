import React from 'react';
import PostIcon from '@material-ui/icons/Book';
import UserIcon from '@material-ui/icons/Group'
import { Admin, Login, Layout, Resource,ListGuesser,EditGuesser  } from 'react-admin';
import MyLayout from './theme/layout';
import authProvider from "./providers/authProvider";
import Dashboard from "./components/dashboard";
import jsonServerProvider from 'ra-data-json-server';
import {UserList, UserEdit, UserCreate} from "./components/users";
import {PostList, PostEdit, PostCreate} from "./components/posts";

//Theming
import { createMuiTheme } from '@material-ui/core/styles';
import blue from '@material-ui/core/colors/blue';
import red from '@material-ui/core/colors/red';
import cyan from '@material-ui/core/colors/cyan';

const MyLoginPage = () => (
    <Login
        // A random image that changes everyday
        backgroundImage="https://source.unsplash.com/random/1600x900/daily"
    />
);


const dataProvider = jsonServerProvider('https://jsonplaceholder.typicode.com');
const theme = createMuiTheme({
  palette: {
        primary: blue,
		secondary: cyan,
        error: red,
        contrastThreshold: 3,
        tonalOffset: 0.2,
  },
  typography: {
        // Use the system font instead of the default Roboto font.
        fontFamily: [
            '-apple-system',
            'BlinkMacSystemFont',
            '"Segoe UI"',
            'Arial',
            'sans-serif',
        ].join(','),
    },
    overrides: {
        MuiButton: { // override the styles of all instances of this component
            root: { // Name of the rule
                color: 'white', // Some CSS
            },
        },
    },
});

function App() {
   return (
       <Admin layout={MyLayout} loginPage={MyLoginPage} theme={theme} dashboard={Dashboard} authProvider={authProvider} dataProvider={dataProvider}>
           <Resource name="users" list={UserList} edit={UserEdit} create={UserCreate} icon={UserIcon} label="Управление пользователями"/>
		   <Resource name="posts" list={PostList} edit={PostEdit} create={PostCreate} icon={PostIcon} label="Новости" />
       </Admin>
   );
}

export default App;