Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'create-ticket-lottery',
      path: '/create-ticket-lottery',
      component: require('./components/Tool'),
    },
  ])
})
