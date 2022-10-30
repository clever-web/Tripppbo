Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'flight-markup',
      path: '/flight-markup',
      component: require('./components/Tool'),
    },
  ])
})
